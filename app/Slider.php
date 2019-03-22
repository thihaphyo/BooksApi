<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "M_SLIDER";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function book()
    {

        return $this->hasOne('App\Book', 'id', 'book_id');
    }
}
