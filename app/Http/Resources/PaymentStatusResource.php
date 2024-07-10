<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->whenLoaded('user')),
            'cart' => new CartResource($this->whenLoaded('cart')),
            'status' => $this->status ? 'paid' : 'unpaid',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
