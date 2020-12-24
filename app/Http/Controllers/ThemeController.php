<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Theme;


class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.editor');
    }

    public function create()
    {
        $themes = Theme::all();
        return view('theme.create', compact('themes'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'theme' => 'required|unique:themes|max:20',
        ]);

        Theme::create(['theme' => $request->theme]);

        return redirect()->route('theme.index');
    }

    public function index()
    {
        $themes = Theme::all();
        $themes = $themes->reverse();

        return view('theme.index', compact('themes'));
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();

        return redirect()->route('theme.index');
    }
}
