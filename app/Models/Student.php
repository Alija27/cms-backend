<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "course_id",
        "batch_id",
        "department_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
