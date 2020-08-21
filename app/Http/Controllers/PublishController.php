<?php

namespace App\Http\Controllers;

use App\Article;

use App\Notifications\NewArticle;

class PublishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Article $article)
    {
        $article->update(['published' => 'true']);

        return $article;
    }
}
