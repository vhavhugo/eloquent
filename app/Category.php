<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Mapeia o relacionamento com a tabela posts
     *
     * @return void
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'category_post', 'category_id', 'post_id')
                    ->withTimestamp();
    }


}
