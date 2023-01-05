<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->save();

        return redirect("/posts/{$post->id}");
    }
}
