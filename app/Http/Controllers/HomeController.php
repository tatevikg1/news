<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Article;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;


class HomeController extends Controller
{
    public function index()
    {
        $themes = Theme::all();
        $articles = Article::where('published','true')->orderBy('created_at', 'desc')->paginate(10);

        return view('home', compact('themes', 'articles'));
    }

    public function show(Article $article)
    {
        $author = User::where('id', $article->user_id)->first();
        $themes = Theme::all();


        return view('article', compact('article', 'themes', 'author'));
    }

    public function filter(Theme $theme)
    {
        $articles = $theme->articles()->latest()->paginate(10);

        $articles = $articles->items();

        $themes = Theme::all();

        return view('home', compact('themes', 'articles'));
    }
}
