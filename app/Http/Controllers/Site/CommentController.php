<?php

namespace App\Http\Controllers\Site;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($postId, Request $request)
    {
        $post = Post::find($postId);

        $post->comments()->create($request->all());

        return back()->with(['success', 'Comentário criado com sucesso']);
    }
}
