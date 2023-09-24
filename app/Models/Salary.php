<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

        protected $fillable = [
            "user_id",
            "month",
            "year",
            "salary",
            "tax",
            "incentive_amount",
            "deduction_amount",
            "deduction_title",
            "net_pay",
            "payment_date",
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
