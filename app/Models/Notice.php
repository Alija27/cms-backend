<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

        protected $fillable = [
            "heading",
            "image",
            "description",
            "date",
            "time",
            "status",
            "user_id"
        ];
}
