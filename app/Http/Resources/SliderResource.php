<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'slider_id' => $this->id,
            'book_dataSource' => $this->book
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
