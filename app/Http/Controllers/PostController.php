<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tag' => 'nullable|max:30',
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

        return redirect('/page/' . $validatedData['page_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->id() !== $post->page->user_id) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('page.show', ['id' => $post->page->id]);
    }
}
