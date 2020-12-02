<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewArticle;
use App\Http\Controllers\EditorController;

class PublishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Article $article)
    {
        $article->update(['published' => 'true']);

        EditorController::updateNotifications($article);
        
        return $article;
    }
}
