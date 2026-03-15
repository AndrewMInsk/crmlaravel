<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResourcesAll extends JsonResource
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
            'theme' => $this->theme,
            'status' => $this->status,
            'customer_name' => $this->resource->getCustomer->customer_name,
            'email' => $this->resource->getCustomer->email,
            'phone' => $this->resource->getCustomer->phone,
        ];
    }

}
