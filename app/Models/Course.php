<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        "course_name",
        "department_id",
        "fees",
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function books()
    {
        return $this->belongsToMany(Course::class, "book_course");
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
