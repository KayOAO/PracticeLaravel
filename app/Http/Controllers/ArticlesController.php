<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:5',
        ]);

        auth()->user()->articles()->create($content);
        return redirect()->route('root')->with('notice', 'add article success');
    }
}
