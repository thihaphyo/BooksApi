<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "M_CATEGORY";
    protected $guard = [];
    protected $primaryKey = "id";

    public function books(){

        return $this->hasMany('App\Book','M_BOOK','id','category_id');
    
    }
}
