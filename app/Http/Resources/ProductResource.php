<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'image' => asset('productImages/'. $this->image),
            'price' => $this->price,
            'status' => $this->status === 1 ? 'open' : 'close',
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
        ];
    }
}
