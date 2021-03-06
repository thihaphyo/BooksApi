<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "M_BOOK";
    protected $guard = [];
    protected $primaryKey = "id";

    public function audioFiles(){

        return $this->hasMany('App\Audios', 'book_id','id');
    }

    public function authors(){

        return $this->belongsToMany('App\Author', 'M_BOOK' ,  'id', 'author_id');
    }

    public function categories(){

        return $this->hasMany('App\Category','id','category_id');
    }
}
