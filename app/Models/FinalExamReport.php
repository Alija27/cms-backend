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

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
