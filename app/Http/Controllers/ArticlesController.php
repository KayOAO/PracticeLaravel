<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->rules = [
            'title' => 'required',
            'content' => 'required|min:5',
        ];
    }

    public function index()
    {
        $articles = Article::with('user')->orderBy('created_at', 'desc')->paginate(3);
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $content = $request->validate($this->rules);

        auth()->user()->articles()->create($content);
        return redirect()->route('root')->with('notice', 'add article success');
    }

    public function edit($id)
    {
        $article = auth()->user()->articles()->find($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = auth()->user()->articles()->find($id);
        $content = $request->validate($this->rules);
        $article->update($content);
        return redirect()->route('root')->with('notice', 'update article success');
    }

    public function destroy($id)
    {
        $article = auth()->user()->articles()->find($id);
        $article->delete($id);
        return redirect()->route('root')->with('notice', 'article deleted');
    }
}
