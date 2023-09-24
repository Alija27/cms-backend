<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinalExamReportResource extends JsonResource
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
            "student_id" => $this->student_id, 
            "student_name" => $this->student->user->user_name,
            "course_id" => $this->course_id,
            "course_name" => $this->course->course_name,
            "semester_id" => $this->semester_id,
            "semester_name" => $this->semester->name,
            "batch_id" => $this->batch_id,
            "batch_year" => $this->batch->year,
            "date" => $this->date,
            "position" => $this->position,
            "grade" => $this->grade,
            "gpa" => $this->gpa,
        ];
    }
}
