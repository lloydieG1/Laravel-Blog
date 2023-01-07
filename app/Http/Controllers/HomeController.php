<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\FunFact;


class HomeController extends Controller
{
    public function show(FunFact $funFact)
    {
        $randomFact = $funFact->getFact();

        return view('home', compact('randomFact'));
    }

    public function getFact(FunFact $funFact)
    {
        return $funFact->getFact();
    }
}
