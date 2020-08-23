<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function reporters()
    {
        $reporters = User::where('role', 1)->paginate(5);

        return view('editor.reporters', compact('reporters'));
    }

    public function index()
    {
        $articles = Article::where('sent', 'true')->paginate(5);

        return view('editor.index', compact('articles'));
    }

}
