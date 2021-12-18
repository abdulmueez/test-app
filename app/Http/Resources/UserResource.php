<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'purchased_credits' => $this->purchased_credits,
            'packages' => $this->whenLoaded('packages', function () {
                return PackageResource::collection($this->packages);
            }),
        ];
    }
}
