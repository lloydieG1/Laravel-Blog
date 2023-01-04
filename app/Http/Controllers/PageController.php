<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PageController extends Controller
{
    /**
     * Display the specified user's page.
     * 
     */
    public function show()
    {
        $user = Auth::user();
        $page = $user->page;
        return view('users.page', ['user' => $user, 'page' => $page]);
    }
}