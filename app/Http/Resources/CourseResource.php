<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            "name" => ucwords($this->name),
            "department" => new DepartmentResource($this->department),
            "fees" => $this->fees,
            "created_at" =>Carbon::parse($this->created_at)->format('l F j,Y'),
            
            
        ];
    }
}
