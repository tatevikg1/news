<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $themes = Theme::all();
        $articles = Article::where('published','true')->orderBy('created_at', 'desc')->paginate(20);

        return view('audience.home', compact('themes', 'articles'));
    }

    public function show(Article $article)
    {
        $author = User::where('id', $article->user_id)->first();
        $themes = Theme::all();

        if($article->published == 'true' || Auth::check()){

            return view('audience.article', compact('article', 'themes', 'author'));
        }
        else {
            return view('layouts.error', compact('themes'));
        }
    }

    public function filter($slug)
    {
        $theme = Theme::where('slug', $slug)->first();
        $articles = $theme->articles()->latest()->paginate(20);

        $themes = Theme::all();

        return view('audience.home', compact('themes', 'articles'));
    }

    public function staff()
    {
        $staff = User::all();
        $themes = Theme::all();

        return view('audience.staff', compact('staff', 'themes'));
    }

    public function about()
    {
        $themes = Theme::all();

        return view('audience.about', compact('themes'));
    }

}
