<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Theme;
use Illuminate\Support\Facades\Auth;

class ReporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $themes = Theme::all();

        return view('reporter.create', compact('themes'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|max:70',
            'content' => 'required|min:5',
            'themes' => 'required',
        ]);


        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = Auth::user()->id;
        $article->save();

        $article->themes()->sync($data['themes']);

        return redirect()->route('articles.index');
    }

    public function index()
    {
        $articles = Article::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('reporter.index', compact('articles'));
    }

    public function edit(Article $article)
    {
        $themes = Theme::all();
        $article = Article::with('themes')->get();

        dd('article');

        return view('reporter.edit', compact('article', 'themes'));
    }

    public function update(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|max:70',
            'content' => 'required|min:5',
            'themes' => 'required',
        ]);


        // $article = new Article;
        // $article->title = $request->input('title');
        // $article->content = $request->input('content');
        // $article->user_id = Auth::user()->id;
        // $article->save();

        $article->themes()->sync($data['themes']);

        return redirect()->route('articles.index');
    }

}
