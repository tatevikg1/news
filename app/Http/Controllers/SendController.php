<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Notifications\NewArticle;

class SendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Article $article)
    {
        dd("hey");
        // $article->update('sent' => 'true');
        // $editor = User::where('role', 0)->first();
        // $editor->notify(new NewArticle($article));

        return $article->update('sent' => 'true');
    }
}
