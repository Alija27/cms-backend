<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "user" => new UserResource($this->user),
            "role" => $this->user->role,
            "month" => $this->month,
            "year" => $this->year,
            "amount" => $this->amount,
            "salary" => $this->salary,
            "tax" => $this->tax,
            "incentive_amount" => $this->incentive_amount,
            "deduction_title" => $this->deduction_title,
            "deduction_amount" => $this->deduction_amount,
            "net_pay" => $this->net_pay,
            "payment_date" => $this->payment_date,

        ];
    }
}
