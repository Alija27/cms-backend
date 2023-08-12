<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoticeResource extends JsonResource
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
            "heading" => $this->heading,
            "description" => $this->description,
            "date" => $this->date,
            "time" => $this->time,
            "status" => $this->status,
            "user_id" => $this->user_id,
            "user_name" => $this->user->name,
        ];
    }
}
