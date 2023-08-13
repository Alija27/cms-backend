<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "book_id"=>$this->book_id,
            "book_name"=>$this->book->name,
            "user"=>new UserResource($this->user),
            "issue_date"=>$this->issue_date,
            "return_date"=>$this->return_date,
            "status"=>$this->status,
            "book_code"=>$this->book_code,
            
        ];
    }
}
