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
            "name"=>$this->user->name,
            "subjects"=>$this->subjects->pluck('name'),
            "semesters"=>$this->semesters->pluck('name'),
            "department"=>$this->departments->pluck('name')->toArray(),
        ];
    }
}
