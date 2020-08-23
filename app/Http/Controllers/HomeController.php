<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;


class HomeController extends Controller
{

    public function index()
    {
        $themes = Theme::all();
        $articles = Article::all()->paginate(10);

        return view('home', compact('themes', 'articles'));
    }

    public function show()
    {

    }
}
