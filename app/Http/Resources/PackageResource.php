<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'commitment_period' => $this->commitment_period,
            'credits' => $this->credits,
            'sell_limit' => $this->sell_limit,
            'start_date' => $this->whenPivotLoaded('user_packages', function () {
                return Carbon::create($this->pivot->start_date)->format('Y-m-d');
            }),
            'end_date' => $this->whenPivotLoaded('user_packages', function () {
                return Carbon::create($this->pivot->end_date)->format('Y-m-d');
            }),
        ];
    }
}
