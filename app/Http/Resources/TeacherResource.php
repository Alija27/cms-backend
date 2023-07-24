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
            "id" => $this->id,
            "user_name"=>$this->user->user_name,
            "email"=>$this->user->email,
            "address"=>$this->user->address,
            "phonenumber"=>$this->user->phonenumber,
            "subject"=>$this->subjects->pluck('subject_name')->toArray(),
            "course"=>$this->courses->pluck('course_name')->toArray(),
            "department"=>$this->departments->pluck('name')->toArray(),
            
        ];
    }
}
