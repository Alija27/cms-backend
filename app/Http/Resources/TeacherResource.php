<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "user_id"=>$this->user->name,
            "subject_id"=>$this->subject_id,
            "semester_id"=>$this->semester_id,
            "department"=>$this->departments()->pluck('name')->toArray(),
        ];
    }
}
