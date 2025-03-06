<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\ClassModel;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request, $class_id, $date)
    {
        $loginId = auth()->user()->login_id;
        $classes = ClassModel::join('timetable', 'classes.class_id', '=', 'timetable.class_id')
            ->where('timetable.teacher_id', $loginId)
            ->pluck('classes.class_id');
        if (!$classes->contains($class_id)) {
            return response()->json(['error' => 'Unauthorized access to this class'], 403);
        }
        $classExists = ClassModel::where('class_id', $class_id)->exists();
        if (!$classExists) {
            return response()->json(['error' => 'Class not found'], 404);
        }
        $students = Student::where('class_id', $class_id)->get();
        $attendance = Attendance::where('class_id', $class_id)
            ->whereDate('date', $date)
            ->get();

        return response()->json([
            'students' => $students,
            'attendance' => $attendance,
        ]);
    }
    public function store(Request $request)
    {
        $Validator = $request->validate([
            'class_id' => 'required|exists:classes,class_id',
            'attendance' => 'required|array',
            'attendance.*.student_id' => 'required|exists:students,id',
            'attendance.*.status' => 'required|in:present,absent',
            'attendance.*.grade' => 'nullable|integer|min:1|max:5',
            'attendance.*.comments' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);

        foreach ($request->attendance as $record) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $record['student_id'],
                    'date' => $request->date
                ],
                [
                    'status' => $record['status'],
                    'class_id' => $request->class_id,
                    'comments' => $record['comments'] ?? null
                ]
            );
        }

        return response()->json(['message' => 'Attendance updated successfully', 'data' => $Validator]);
    }
}
