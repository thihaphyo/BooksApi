<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'book_id' => $this->id,
            'book_name' => $this->name,
            'book_cover' => $this->book_photo,
            'category_id' => $this->category_id,
            'category' => $this->categories,
            'book_desc' => $this->desc,
            'author_id' => $this->author_id,
            'author' => $this->authors
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
