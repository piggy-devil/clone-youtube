<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Product extends JsonResource
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
            'data' => [
                'type' => 'products',
                'product_id' => $this->id,
                'attributes' => [
                    'posted_by' => new UserResource($this->user),
                    'name' => $this->name,
                    'buyprice' => $this->buyprice,
                    'buyfrom' => $this->buyfrom,
                    'sellprice' => $this->sellprice,
                    'sellto' => $this->sellto,
                    'posted_at' => $this->created_at->diffForHumans(),
                ]
            ],
            'links' => [
                'self' => url('/products/' . $this->id),
            ]
        ];
    }
}
