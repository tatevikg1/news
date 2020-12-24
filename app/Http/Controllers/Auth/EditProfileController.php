<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class EditProfileController extends Controller
{

    protected $redirectTo = "/articles";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showEditForm()
    {
        $user = Auth::user();

        return view('auth.edit', compact('user'));
    }

    protected function update(Request $request)
    {
        $user = Auth::user();

        $data = request()->validate([
            'email' => ['nullable', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $data = array_filter($data);


        $user->update($data);

        return redirect()->route('article.index');
    }
}
