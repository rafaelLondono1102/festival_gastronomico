<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'user_id' => $this->id,
            'type' => $this->type,
            'restaurants' => $this->restaurants->map(function ($restaurant) {
                $parsed_url = parse_url(route('restaurants.show',[$restaurant->id]));
                return $parsed_url['path'];
            })
        ];
    }
}
