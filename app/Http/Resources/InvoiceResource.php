<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            "number" => $this->number,
            "customer_id" => $this->customer_id,
            "date" => $this->date,
            "due_date" => $this->due_date,
            "total" => $this->total,
        ];
    }
}
