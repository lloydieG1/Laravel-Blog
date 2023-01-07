<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:64',
        ]);
        $tag = new Tag;
        $tag->name = $validatedData['name'];

        $tag->save();

        return redirect('/tags/create');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        $posts = $tag->posts()->paginate();

        return view('tags.show', compact('tag', 'posts'));
    }
}
