<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
    
     /**
     * Mapeia o relacionamento com o modo comentários
     *
     * @return void
     */
class Comment extends Model
{
   public function post(){
      return $this->belongsTo('App\Post', 'post_id', 'id');
   }
}
