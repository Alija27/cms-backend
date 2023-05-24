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
            "name" => $this->user->name,
            "email" => $this->user->email,
            "address" => $this->user->address,
            "phonenumber" => $this->user->phonenumber,
            "date_of_birth" => $this->user->date_of_birth,
            "course"=>$this->course->name,
            "batch"=>$this->batch->year,
            "department"=>$this->department->name,
        ];
    }
}
