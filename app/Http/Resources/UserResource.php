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
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'roles' => $this->getRoleNames(),
            'permissions' => $this->getAllPermissions()->pluck('name'),
            'brands' => BrandResource::collection($this->whenLoaded('brands')),
            'is_admin' => $this->hasRole('admin'),
            'is_client' => $this->hasRole('client'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
