<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Category;

class SubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'subcategory';
    public function toArray($request)
    {
        return [
            'sid' => $this->id,
            'name' => $this->name,
            'category_id' => Category::find($this->category_id),
            'created_at' => $this->created_at->format('d-m-Y h:i:s'),
            'updated_at' => $this->updated_at->format('d-m-Y h:i:s'),
        ];
    }
}
