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
   protected $fillable = ['title', 'content'];
   public function post(){
      return $this->belongsTo('App\Post', 'post_id', 'id');
   }

   public function categories()
   {
      return $this->belongsToMany('App\Category', 'category_post', 'post_id', 'category_id')
                  ->withTimestamps();
   }
}
