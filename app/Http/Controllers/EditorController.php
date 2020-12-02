<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.editor');
    }


    public function reporters()
    {
        $reporters = User::where('role', 1)->paginate(5);

        return view('editor.reporters', compact('reporters'));
    }

    public function index()
    {
        $articles = Article::where('sent', 'true')->latest()->paginate(5);

        $editor = User::where('role', 0)->first();
        $temp = $editor->unreadnotifications->toArray();
        $notifications = array_column(array_column($temp, 'data'), 'article_id');
        return view('editor.index', compact('articles', 'notifications'));
    }

    public static function updateNotifications(Article $article)
    {
        DB::table('notifications')->where('data', '{"article_id":'.$article->id.'}')->update(['read_at' => now()]);
        
    }

}
