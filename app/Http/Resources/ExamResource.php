<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
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
            "exam_name" => $this->exam_name,
            "exam_date" => $this->exam_date,
            "exam_time" => $this->exam_time,
            "exam_duration" => $this->exam_duration,
            "exam_type" => $this->exam_type,
            "course_id" => $this->course_id,
            "course_name" => $this->course->course_name,
            "teacher_id" => $this->teacher_id,
            "teacher_name" => $this->teacher->teacher_name,
            "semester_id" => $this->semester_id,
            "semester_name" => $this->semester->semester_name,
            "subject_id" => $this->subject_id,
            "subject_name" => $this->subject->subject_name,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
