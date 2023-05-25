<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "publication",
        "quantity",
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, "book_course");
    }
}
