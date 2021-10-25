<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment' => $this->comment,
            'score' => $this->score,
            'id' => $this->id,
            'restaurant' => $this->restaurant->name,
            'user' => $this->user->name
        ];
    }
}
