<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
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
            'id'           => $this->id,
            'title'        => $this->title,
            'completed_at' => $this->completed_at,
            'created_at'   => $this->created_at,
            'deleted_at'   => $this->deleted_at,

            /**
             * Relationships
             */
            'owner' => UserResource::make($this->whenLoaded('user'))
        ];
    }
}
