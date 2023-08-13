<?php

namespace App\Http\Resources;

use App\Models\BookTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            "name"=>$this->name,
            "publication"=>$this->publication,
            "quantity"=>$this->quantity,
            "course"=>$this->courses,
            "remaining"=> $this->quantity - BookTransaction::where("book_id" , $this->id)->where("status" , "issued")->count(),
        ];
    }
}
