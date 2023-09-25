<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "user_name" => $this->user->user_name,
            "guardian_name" => $this->user->guardian_name,
            "total_fees" => $this->total_fees,
            "paid_fees" => $paidFees = $this->paid_fees,
            "course_id" => $this->course_id,
            "course_name" => $this->course->course_name,
            "remaining_fees" => $this->total_fees - $paidFees,
        ];
    }
}
