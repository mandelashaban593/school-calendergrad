<?php
// ExamScore.php (app/Models/ExamScore.php)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'student_id',
        'subject_id',
        'class_id',
        'student_name',
        'subject_name',
        'class_name',
        'email',
        'first_name',
        'last_name',
        'phone_number',
        'score',
    
    ];


}
