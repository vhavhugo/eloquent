<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if($post){
            $request->session()->flash('sucess', 'Post cadastrado com sucesso');
        }else{
            $request->session()->flash('error', 'Erro ao cadastrar Post');
        }
        return redirect()->route('posts.index');
    }
    /**
     * Mostra um post único
     *
     * @param int $id
     * @return void
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $result = Post::update($request->all());

        if($result){
            $request->session()->flash('sucess', 'Post atualizado com sucesso');
        }else{
            $request->session()->flash('error', 'Erro ao atualizar Post');
        }
        return redirect()->route('posts.index');
    }
    
    public function destroy(Post $post, Request $request)
    {
        if($post->delete()){
            $request->session()->flash('sucess', 'Post deletado com sucesso');
        }else{
            $request->session()->flash('error', 'Erro ao deletar Post');
        }
        return redirect()->route('posts.index');
    }

    
}
