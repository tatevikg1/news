<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;


class HomeController extends Controller
{

    public function index()
    {
        $themes = Theme::all();

        return view('home', compact('themes'));
    }

    public function show()
    {
        
    }
}
