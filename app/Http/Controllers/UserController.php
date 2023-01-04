<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
 
class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     */
    public function show($id)
    {
        return view('users.page', [
            'user' => User::findOrFail($id)
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