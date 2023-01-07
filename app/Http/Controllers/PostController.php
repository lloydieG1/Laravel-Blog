<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:64',
            'body' => 'required|string',
            'tags' => 'nullable|array|exists:tags,id',
            'image_url' => 'nullable|image',
            'page_id' => 'required|integer'
        ]);
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->page_id = $validatedData['page_id'];
        if ($request->hasFile('image_url')) {
            $post->image_url = $request->file('image_url')->store('images', 'public');
        }
        $post->save();

        if($request->has('tags')){
            $post->tags()->sync($validatedData['tags']);
        }

        return redirect('/page/' . $validatedData['page_id']);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

        if (auth()->id() !== $post->page->user_id and Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('posts.edit', compact('post', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:64',
            'body' => 'required|string',
            'tags' => 'nullable|array|exists:tags,id',
            'image_url' => 'nullable|image',
            'page_id' => 'required|integer'
        ]);
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->page_id = $validatedData['page_id'];
        if ($request->hasFile('image_url')) {
            $post->image_url = $request->file('image_url')->store('images', 'public');
        }

        $post->save();

        if($request->has('tags')){
            $post->tags()->sync($validatedData['tags']);
        }

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('page.show', ['id' => $post->page->id]);
    }
}
