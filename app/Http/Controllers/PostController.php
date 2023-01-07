<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
            'title' => 'required|max:255',
            'body' => 'required',
            'tags' => 'array|exists:tags,id',
            'image_url' => 'image',
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

        $post->tags()->sync($validatedData['tags']);

        return redirect('/page/' . $validatedData['page_id']);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (auth()->id() !== $post->page->user_id) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tag' => 'nullable|max:30',
            'image_url' => 'image',
            'page_id' => 'required|integer'
        ]);
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->page_id = $validatedData['page_id'];
        if ($request->hasFile('image_url')) {
            $post->image_url = $request->file('image_url')->store('images', 'public');
        }

        $post->save();

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('page.show', ['id' => $post->page->id]);
    }
}
