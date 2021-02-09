<?php

namespace App\Http\Controllers;

use App\Article;
use App\Notifications\NewArticle;
use App\Http\Controllers\EditorController;
use App\User;

class VuejsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send(Article $article)
    {
        $article->update(['sent' => 'true']);

        $editor = User::where('role', 0)->first();
        $editor->notify(new NewArticle($article));

        return $article;
    }

    public function publish(Article $article)
    {
        $article->update(['published' => 'true']);

        EditorController::updateNotifications($article);
        
        return $article;
    }
}