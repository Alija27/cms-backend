<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
            "exam_id" => ["required", "exists:exams,id"],
            "student_id" => ["required", "exists:students,id"],
            "marks" => ["required", "string"],
            "status" => ["required", "string"],
            "semester_id" => ["required", "exists:semesters,id"],
            "course_id" => ["required", "exists:courses,id"],
        ];
    }
}
