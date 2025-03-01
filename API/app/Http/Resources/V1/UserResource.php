<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'userid' => $this->id,
            'username' => $this->name,
            'email' => $this->email,
            'avatarPath' => $this->avatar_path,
            'isPassword' => (bool) $this->is_password,
            // 'roleId' => $this->role_id,
            'role' => new RoleResource($this->whenLoaded('role')),
        ];
    }
}
