<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
     protected $fillable = [
        "subject_id",
        "semester_id",
        "course_id",
        "teacher_id",
        "date",
        "time",
        "duration",
        "total_marks",
        "pass_marks",
        "exam_type",
    ];
}

