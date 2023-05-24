<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            "name"=>["required"],
            "course_id"=>["required","exists:courses,id"],
            "semester_id"=>["required","exists:semesters,id"],
            "subject_code"=>["required","unique:subjects,subject_code"],
            "publication"=>["nullable"],
        ];
    }
}
