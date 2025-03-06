<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{
    public function index(Request $request)
    {
        $loginId = Auth::user()->login_id;
        $teacher = \App\Models\Teacher::where('login_id', $loginId)->first();

        if (!$teacher) {
            return response()->json(['message' => 'Учитель не найден'], 404);
        }

        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        // Фильтруем расписание по диапазону дат
        $timetable = Timetable::where('teacher_id', $teacher->login_id)
            ->whereBetween('date', [$start_date, $end_date])
            ->with([
                'subject' => function ($query) {
                    $query->select('subject_id', 'name');
                },
                'class' => function ($query) {
                    $query->select('class_id', 'name');
                },
                'teacher' => function ($query) {
                    $query->select('login_id', 'name');
                }
            ])
            ->get();

        return response()->json([
            'status' => 'ok',
            'timetable' => $timetable
        ]);
    }
}
