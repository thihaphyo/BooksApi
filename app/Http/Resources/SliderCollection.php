<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\SliderResource;

class SliderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => SliderResource::collection($this->collection)
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [

            ],
        ];
    }
}
