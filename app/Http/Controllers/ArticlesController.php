<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    protected function validateArticle()
    {
        return request()->validate(
            [
                'title' => 'required',
                'content' => 'required|min:5',
                'tags' => 'exists:tags,id'
            ]
        );
    }

    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->orderBy('created_at', 'desc')->paginate(3);
        } elseif (request('author')) {
            $articles = Article::with('user')->where('user_id', request('author'))->orderBy('created_at', 'desc')->paginate(3);
        } else {
            $articles = Article::with('user')->orderBy('created_at', 'desc')->paginate(3);
        }

        $tags = Tag::all();
        return view('articles.index', ['articles' => $articles, 'tags' => $tags]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $content = $this->validateArticle();
        $article = auth()->user()->articles()->create($content);
        if (request('tags')) {
            $article->tags()->attach(request('tags'));
        }

        return redirect()->route('root')->with('notice', 'add article success');
    }

    public function edit($id)
    {
        $article = auth()->user()->articles()->find($id);
        $tags = Tag::all();
        return view('articles.edit', ['article' => $article, 'tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        $article = auth()->user()->articles()->find($id);
        $content = $this->validateArticle();
        dd($content);
        $article->update($content);
        return redirect()->route('root')->with('notice', 'update article success');
    }

    public function destroy($id)
    {
        // echo url()->previous();
        // dd(request());
        // $route = 'root';
        // if (strpos(url()->previous(), '?')) {
        //     $route = '/articles' . explode('?', url()->previous())[1];
        // }
        $article = auth()->user()->articles()->find($id);
        $article->delete($id);
        return redirect()->route('root')->with('notice', 'article deleted');
    }
}
