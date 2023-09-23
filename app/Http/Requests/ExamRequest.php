<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            "date" => ["required", "date"],
            "time" => ["required"],
            "duration" => ["required"],
            "exam_type" => ["required"],
            "course_id" => ["required"],
            "teacher_id" => ["required"],
            "semester_id" => ["required"],
            "subject_id" => ["required"],
            "total_marks" => ["required"],
            "pass_marks" => ["required"],
            "description" => ["required"],
            "is_active" => "true",

            
];
    }
}
