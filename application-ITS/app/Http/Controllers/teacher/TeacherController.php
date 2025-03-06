<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function getTeacherName() {
            if (!Auth::check()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $teacher = Auth::user()->teacher; 
            if (!$teacher) {
                return response()->json(['error' => 'Teacher not found'], 404);
            }
        
            return response()->json([
                'name' => $teacher->name,
                'subject' => $teacher->subject
            ]);
    }
}
