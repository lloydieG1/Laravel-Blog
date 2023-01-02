<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
 
class UserController extends Controller
{
    public function show($id)
    {
        return view('users.page', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $post = Post::create($validatedData);
        return redirect('/posts/' . $post->id);
    }
}