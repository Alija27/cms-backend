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
            "name"=>$this->name,
            "course_id"=>$this->course_id,
            "semester_id"=>$this->semester_id,
            "subject_code"=>$this->subject_code,
            "publication"=>$this->publication,
        ];
    }
}
