- Criar no nova chave estrangeira
php artisan make:migration add_foreign_key_post_id


Relacionamento 1 para 1

Mapeando Relacionamento - Inserir post_id na tabela datails.

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

--------------------------------------------------
class Post extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * Mapeia o relacionamento com o model Details
     *
     * @return void
     */
    public function details(){
        return $this->hasOne('App\Details');
    }
}

------------------------------------------------------
Obtendo dados
$post = \App\Post::find(1)
$post->details

$detalhes = \App\Details::find(2)
$detalhes->post
--------------------------------------------------
Persistindo dados 
- belongsTo - você consegue usar o associate
- hasOne, pode usar o método create
$post = \App\Post::create(['title' => 'meu post 1 para 1', 'content' => 'conteudo de teste'])
$post->details()->create(['status' => 'rascunho', 'visibility' => 'privado'])
- 
$post3 = \App\Post::find(3)
$detalhes = new \App\Details
$detalhes->status = 'publicado'
$detalhes->visibilty = 'publico'
$detalhes->post()->associate($post3)
$detalhes->save()

/////////////////////////////////////////////////
Relacionamento 1 para N

     /**
     * Mapeia o relacionamento com o modo comentários
     *
     * @return void
     */
class Comment extends Model
{
   public function post(){
      return $this->belongsTo('App\Post');
   }
}

------------------------------------------
     /**
     * Mapeia o relacionamento com o model de comentários
     *
     * @return void
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
--------------------------------------------



