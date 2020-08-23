<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Notifications\NewArticle;

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

        $editor = User::where('role', 0)->first();
        $temp = $editor->unreadnotifications->toArray();
        $notifications = array_column(array_column($temp, 'data'), 'article_id');


        return view('reporter.index', compact('articles', 'notifications'));
    }

    public function edit(Article $article)
    {
        $themes = Theme::all();
        $t = DB::table('article_theme')->where('article_id', $article->id)->pluck('theme_id')->toArray();

        if(Auth::user()->role == 0){
            
            DB::table('notifications')->where('data', '{"article_id":'.$article->id.'}')->update(['read_at' => now()]);
        }


        return view('reporter.edit', compact('article', 'themes', 't'));
    }

    public function update(Request $request, Article $article)
    {
        $data = request()->validate([
            'title' => 'required|max:70',
            'content' => 'required|min:5',
            'themes' => 'required',
        ]);

        $article->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        $article->themes()->sync($data['themes']);


        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
   {
       $article->themes()->sync([]);

       $article->delete();

       return redirect()->route('articles.index');
   }

}
