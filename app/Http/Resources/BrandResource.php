<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'brand';
    public function toArray($request)
    {
        return [
            'bid' => $this->id,
            'name' => $this->name,
            'photo' => url($this->photo),
            'created_at' => $this->created_at->format('d-m-Y h:i:s'),
            'updated_at' => $this->updated_at->format('d-m-Y h:i:s'),
        ];
    }
}
