<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\User;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'order';
    public function toArray($request)
    {
       return [
            'oid' => $this->id,
            'codeno' => $this->codeno,
            'orderdate' => $this->orderdate,
            'total' => $this->total,
            'status' => $this->status,
            'user_id' => User::find($this->user_id),
            'created_at' => $this->created_at->format('d-m-Y h:i:s'),
            'updated_at' => $this->updated_at->format('d-m-Y h:i:s'),
        ];
    }
}
