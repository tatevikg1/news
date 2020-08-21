<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
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

    public function store(Request $request, Article $article)
    {
        $editor = User::where('role', 0)->first();
        $editor->notify(new NewArticle($article));


        return $article->update('sent' => 'true');;
    }
}
