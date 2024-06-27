<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'weekday',
        'start_time',
        'end_time',
        'schclass',
        'subject',
        'teacher',
        'teacher_name',
        'subject_name',
        'class_name',
        'room',
        'school_year',
        'term',
        'class_size'
    ];
}

