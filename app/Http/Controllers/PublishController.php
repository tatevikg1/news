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

        return $article->update('published' => 'true');
    }
}
