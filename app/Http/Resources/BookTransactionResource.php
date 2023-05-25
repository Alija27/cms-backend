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
            "book"=>$this->book->name,
            "student"=>$this->student->name,
            "issue_date"=>$this->issue_date,
            "return_date"=>$this->return_date,
            "status"=>$this->status,
        ];
    }
}
