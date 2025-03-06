<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $primaryKey = 'login_id';
    protected $fillable = [
        'name',
        'login_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'login_id');
    }
    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'teacher_id', 'login_id');
    }
}
