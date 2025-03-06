<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = ['name'];

    // Связь с Timetable
    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'subject_id', 'subject_id');
    }
}
