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
            "subject"=>$this->subjects,
            "date_of_birth"=>$this->user->date_of_birth,
            "course"=>$this->courses,
            "department"=>$this->departments,
            
        ];
    }
}
