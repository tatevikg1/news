<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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


}
