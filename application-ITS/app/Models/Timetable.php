<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetable';
    protected $fillable = ['teacher_id', 'class_id', 'subject_id', 'date', 'lesson_number'];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'login_id');
    }
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'class_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'subject_id');
    }
}
