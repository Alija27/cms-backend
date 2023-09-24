<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalExamReport extends Model
{
    use HasFactory;

    protected $table = 'finalexamreport';

    protected $fillable = [
        "course_id",
        "semester_id",
        "student_id",
        "batch_id",
        "date",
        "position",
        "grade",
        "gpa",
    ];
}
