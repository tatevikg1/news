<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();

        return view('article.index', compact('articles'));
    }

    public function theme(Article $article)
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function destroy()
    {

    }

    public function update()
    {

    }

    public function edit()
    {

    }

}
