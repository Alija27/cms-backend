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
        return $this->belongsToMany(Subject::class);
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_teacher');
    }
}
