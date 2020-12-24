<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

// use App\Article;
// use App\Theme;
// use App\User;

// use App\Notifications\NewArticle;
// use App\Http\Controllers\EditorController;

// class ReporterController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     public function create()
//     {
//         $themes = Theme::all();

//         return view('reporter.create', compact('themes'));
//     }

//     public function store(Request $request)
//     {
//         $data = request()->validate([
//             'title' => 'required|max:70',
//             'content' => 'required|min:5',
//             'themes' => 'required',
//         ]);

//         $article = new Article;
//         $article->title = $request->input('title');
//         $article->content = $request->input('content');
//         $article->user_id = Auth::user()->id;
//         $article->save();

//         $article->themes()->sync($data['themes']);

//         if (Auth::user()->role  == 0){

//             $article->update(['sent' => 'true']);

//             return redirect()->route('editor.index');
//         }
//         return redirect()->route('articles.index');
//     }

//     public function index()
//     {
//         $articles = Article::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);

//         $editor = User::where('role', 0)->first();
//         $temp = $editor->unreadnotifications->toArray();
//         $notifications = array_column(array_column($temp, 'data'), 'article_id');

//         return view('reporter.index', compact('articles', 'notifications'));
//     }

//     public function show(Article $article)
//     {
//         return view('reporter.show', compact('article'));
//     }

//     public function edit(Article $article)
//     {
//         if (Auth::user()->can('update', $article)) {

//             $themes = Theme::all();
//             $t = DB::table('article_theme')->where('article_id', $article->id)->pluck('theme_id')->toArray();

//             if(Auth::user()->role == 0){

//                 EditorController::updateNotifications($article);
//             }

//             return view('reporter.edit', compact('article', 'themes', 't'));
//         }else{
//             return response([
//                 'success' => false,
//                 'message' => "Unauthorized"
//             ], 404);
//         }

//     }

//     public function update(Request $request, Article $article)
//     {
//         if (Auth::user()->can('update', $article)) {
//             $data = request()->validate([
//                 'title' => 'required|min:3|max:100',
//                 'content' => 'required|min:5',
//                 'themes' => 'required',
//             ]);

//             $article->update([
//                 'title' => $data['title'],
//                 'content' => $data['content'],
//             ]);

//             $article->themes()->sync($data['themes']);

//             return redirect()->route('articles.index');
//         }else{
//             return response([
//                 'success' => false,
//                 'message' => "Unauthorized"
//             ], 404);
//         }
//     }

//     public function destroy(Article $article)
//     {
//         if (Auth::user()->can('delete', $article)) {

//             $article->themes()->sync([]);

//             $article->delete();

//             return redirect()->route('articles.index');
//         }
//         return "you can not delete";
//     }
// }
