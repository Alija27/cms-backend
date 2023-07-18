<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "subject_name"=>$this->subject_name,
            "course_id"=>$this->course_id,
            "course_name"=>$this->course->course_name,
            "semester_id"=>$this->semester_id,
            "semester_name"=>$this->semester->name,
            "subject_code"=>$this->subject_code,
            "publication"=>$this->publication,
        ];

        
    }
}
