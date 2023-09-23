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
            
            "date" => $this->date,
            "time" => $this->time,
            "duration" => $this->duration,
            "exam_type" => $this->exam_type,
            "course" => new CourseResource($this->course),
            "teacher" => new TeacherResource($this->teacher),
            "semester" => new SemesterResource($this->semester),
            "subject" => new SubjectResource($this->subject),
            "total_marks" => $this->total_marks,
            "pass_marks" => $this->pass_marks,
            "description" => $this->description,
            "is_active" => $this->is_active,

        ];
    }
}
