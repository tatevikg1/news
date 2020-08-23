<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewArticle;
use Illuminate\Support\Facades\DB;

class PublishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Article $article)
    {
        $article->update(['published' => 'true']);

        DB::table('notifications')->where('data', '{"article_id":'.$article->id.'}')->update(['read_at' => now()]);


        return $article;
    }
}
