<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audios extends Model
{
    protected $table = "M_AUDIO";
    protected $guard = [];
    protected $primaryKey = "id";

    public function book(){

        return $this->belongsTo('App\Book');
    }
}
