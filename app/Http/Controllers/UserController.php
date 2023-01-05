<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Page;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     */
    public function show(Page $page)
    {
        //$debug = Page::findOrFail($id);
        //dd($debug);
        return view('page.show', compact('page'));
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', ['users' => $users]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

}
