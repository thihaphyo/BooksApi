<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "M_AUTHOR";
    protected $guard = [];
    protected $primaryKey = "id";

    public function books(){

        return $this->belongsToMany('App\Book', 'M_BOOK', 'id', 'author_id');

    }
}
