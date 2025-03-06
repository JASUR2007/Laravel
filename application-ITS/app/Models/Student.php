<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'phone',
        'address',
        'class_id',
        'courses'
    ];

    protected $dates = ['deleted_at'];

    public function class() {
        return $this->belongsTo(ClassModel::class);
    }
}
