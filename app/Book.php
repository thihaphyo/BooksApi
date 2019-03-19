<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "M_BOOK";
    protected $guard = [];
    protected $primaryKey = "id";

    public function audioFiles(){

        return $this->hasMany('App\Audios', 'M_AUDIO','id','book_id');
    }

    public function authors(){

        return $this->belongsToMany('App\Author', 'M_AUTHOR', 'author_id', 'id');
    }
}
