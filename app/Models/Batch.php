<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable=[
        "year",
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public static function current_batch()
    {
        return Batch::where("year", date("Y"))->first();
    }
}
