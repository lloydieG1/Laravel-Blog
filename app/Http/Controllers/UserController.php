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
    public function show($id)
    {
        return view('page.show', [
            'page' => Page::findOrFail($id)
        ]);
    }

    public function index()
    {
        $users = User::simplePaginate(10);
        return view('users.index', ['users' => $users]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

}