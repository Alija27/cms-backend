<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "subject_id",
        "semester_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_teacher');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher');
    }
}
