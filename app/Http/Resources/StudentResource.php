<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "user" => new UserResource($this->user),
            "email" => $this->user->email,
            "address" => $this->user->address,
            "phonenumber" => $this->user->phonenumber,
            "date_of_birth" => $this->user->date_of_birth,
            "department"=>new DepartmentResource($this->department),
            "course"=> new  CourseResource($this->course),
            "batch"=>new BatchResource($this->batch),
        
        ];
    }
}
