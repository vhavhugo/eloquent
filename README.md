
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

