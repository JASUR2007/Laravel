<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $primaryKey = 'class_id';
    public $incrementing = false;

    protected $fillable = ['class_id', 'name'];

    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'class_id', 'class_id');
    }
}
