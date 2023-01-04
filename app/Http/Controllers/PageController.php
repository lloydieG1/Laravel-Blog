<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display the specified user's page.
     * 
     */
    public function show($id)
    {   
        //$debug = Page::findOrFail($id);
        //dd($debug);
        return view('page.show', [
            'page' => Page::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('page.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'tag' => 'nullable|max:30',
            'user_id' => 'required|integer'
        ]);
        //dd($validatedData);
        $page = new Page;
        $page->title = $validatedData['title'];
        $page->description = $validatedData['description'];
        $page->user_id = $validatedData['user_id'];
        $page->save();
        
        session()->flash('message', 'Page was created');
        
        return redirect('/page/' . $page->id);
    }
}