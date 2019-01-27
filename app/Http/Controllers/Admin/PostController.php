<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('create_at', 'desc')
                    // ->has('comments', '>', '10')
                    ->whereHas('details', function($query){
                        $query->where('status', 'publicado')
                              ->where('visibility', 'publico');
                    })
                    ->paginate(10);

        return view('admin.posts.index')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\postRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postRequest $request)
    {
        $post = Post::create($request->only('title', 'content'));
        $post->details()->create($request->only('status', 'visibility'));

        if ($post) {
            $request->session()->flash('success', 'Post cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar Post');
        }
        
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\postRequest
     * @param \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $result = $post->update($request->only('title', 'content'));

        if ($result) {
            $post->details->update($request->only('status', 'visibility'));
            $request->session()->flash('success', 'Post atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar Post');
        }
        
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        if ($post->delete()) {
            $request->session()->flash('success', 'Post deletado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar Post');
        }

        return redirect()->route('posts.index');
    }
}
