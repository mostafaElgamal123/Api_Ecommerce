<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\{OrderProductsResource};

class OrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'order_products'=>OrderProductsResource::collection($this->orderProducts),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
