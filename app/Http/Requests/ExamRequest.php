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
            "id" => $this->id,
            "subject_id" => $this->subject_id,
            "course_id" => $this->course_id,
            "semester_id" => $this->semester_id,
            "teacher_id" => $this->teacher_id,
            "date" => $this->date,
            "time" => $this->time,

        ];
    }
}
