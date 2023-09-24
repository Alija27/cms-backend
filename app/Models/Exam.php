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
        "description",
        
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function results()
    {
        return $this->belongsTo(Result::class);
    }
}

