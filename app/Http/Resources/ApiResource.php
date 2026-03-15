<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'text'=>$this->text,
            'id'=>$this->id,
            'theme' => $this->theme,
            'customer_name' => $this->resource->getCustomer->customer_name,
            'phone' => $this->resource->getCustomer->phone,
            'email' => $this->resource->getCustomer->email,
            'status' => $this->resource->status,
            'received' => true,
            'image' => $this->getFirstMediaUrl('images'),
        ];
    }

}
