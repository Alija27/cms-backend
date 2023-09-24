<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinalExamReportRequest extends FormRequest
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
            "student_id"=>["required"],
            "course_id"=>["required"],
            "semester_id"=>["required"],
            "batch_id"=>["required"],
            "date"=>["required"],
            "position"=>["required"],
            "grade"=>["required"],
            "gpa"=>["required"],
        ];
    }
}
