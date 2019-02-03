- Criar migrate para N para N
php artisan make:migration create_category_post_tabel

- Criar no nova chave estrangeira
php artisan make:migration add_foreign_key_post_id

- Criar migration para duas chaves estrangeiras
php artisan make:migration create_category_post_table


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

Relacionamento N para N

class Details extends Model
{
    public function Categories()
    {
        return $this->belongToMany('App\Category');
    }
}

class Category extends Model
{
    /**
     * Mapeia o relacionamento com a tabela posts
     *
     * @return void
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'category_post', 'category_id', 'post_id')->withTimestamp();
        /** ->withTimestamp(); faz enviar a data do create */
    }
}

class Post extends Model
{
    /**
     * Mapeia o relacionamento com o model de categorias
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_post', 'post_id', 'category_id');
    }
}

class Comment extends Model
{

   public function categories()
   {
      return $this->belongsToMany('App\Category', 'category_post', 'post_id', 'category_id')
                  ->withTimestamps();
   }
}


$post = \App\Post::find(1)
$post->categories()->create(['name' => 'teste', 'description' => 'teste'])
/** Liga as categorias - Associa a relação atraves do id
$post->categories()attach(1)
/** Desassocia a relação atraves do id
$post->categories()detach([2,3,4])
/** Inverte relaciona e desrelaciona invertendo o estado atual
$post->categories()->sync([1,2,3,4])
/** Ele mantem o que está e coloca mais os solicitados
$post->categories()->syncWithoutDetaching([5,8])
/** Inverte o que tiver
$post->categories()->syncWithoutDetaching([5,8])
$post->categories()->toggle([5,8])

