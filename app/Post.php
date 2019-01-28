<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * Mapeia o relacionamento com o model Details
     *
     * @return void
     */
    public function details(){
        return $this->hasOne('App\Details', 'post_id', 'id')
                    ->withDefault(function($details){
                        $details->status = 'rascunho';
                        $details->visibility = 'private';
                    });
    }

    /**
     * Mapeia o relacionamento com o model de comentários
     *
     * @return void
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
