<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "book_id"=>["required"],
            "user_id"=>["required"],
           
            "return_date"=>["nullable"],
            "book_code"=>["required"],
        ];
    }
}
