<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "user_id"=>["required"],
            "month"=>["required"],
            "year"=>["required"],
            "amount"=>["required"],
            "salary"=>["required"],
            "tax"=>["required"],
            "incentive_amount"=>["required"],
            "deduction_title"=>["required"],
            "deduction_amount"=>["required"],
            "net_pay"=>["required"],
        ];
    }
}
