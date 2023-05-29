<?php

namespace App\Http\Requests;

use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            "semester_subject" => ['required', 'array', function ($attribute, $value, $fail) {
                //semester
                $keys  = collect($value)->keys();
                $semester_ids = Semester::select('id')->get()->pluck('id')->toArray();
                foreach ($keys as $key) {
                    if (!in_array($key, $semester_ids)) {
                        $fail("Semester $key doesn't exist");
                    }
                }
                //subject
                $values = collect($value)->values();
                $subject_ids = Subject::select('id')->get()->pluck('id')->toArray();
                foreach ($values as $value) {
                    if (!in_array($value, $subject_ids)) {
                        $fail("Subject $value doesnt exist");
                    }
                }
            }],
            "department_id" => ["required"],
        ];
    }
}
