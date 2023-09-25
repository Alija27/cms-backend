<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable =[
        "user_id",
        "total_fees",
        "paid_fees",
        "course_id",
    ];

    protected $casts = [
        "total_fees" => "float",
        "paid_fees" => "float",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
