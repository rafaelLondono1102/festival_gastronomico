<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'city' => $this->city,
            'phone' => $this->phone,
            'id' => $this->id,
            'user' => $this->user->name,
            'category' => $this->category->name
        ];

        //return parent::toArray($request);
    }
}
