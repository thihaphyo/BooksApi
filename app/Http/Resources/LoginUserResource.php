<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    /**
     * @param string $wrap
     */
    public static function setWrap(string $wrap): void
    {
        self::$wrap = "aaaa";
    }

    public function toArray($request)
    {
        return [
            'user_name' => $this->name,
            'email' => $this->email
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
