<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Brand;
use App\Subcategory;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'item';
    public function toArray($request)
    {
        return [
            'item_id' => $this->id,
            'codeno' => $this->codeno,
            'name' => $this->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'description' => $this->description,
            'photo' => url($this->photo),
            'brand' => Brand::find($this->brand_id),
            'subcategory' => Subcategory::find($this->subcategory_id),
            'created_at' => $this->created_at->format('d-m-Y h:i:s'),
            'updated_at' => $this->updated_at->format('d-m-Y h:i:s'),
        ];
    }
}
