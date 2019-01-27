<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    /**
     * Mapeia o relacionamento com o modo Post
     *
     * @return void
     */
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
