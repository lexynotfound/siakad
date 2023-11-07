<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* return parent::toArray($request); */
        /*
            Memilah data yang masuk atau di tampilkan
         */

        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'roles' => $this->roles,
            'profile_image' => $this->profile_image,
        ];
    }
}
