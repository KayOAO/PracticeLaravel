@extends('layouts.article')

@section('pageTitle', '列表頁')
@section('main')
    <a href="{{ route('articles.create') }}">新增文章</a>
    @foreach ($articles as $article)
        <div class="border-t border-gray-300 my-1 p-2">
            <h3 class="font-bold text-lg">{{ $article->title }}</h3>
            <p>{{ $article->created_at }} 由 {{ $article->user->name }} 發表 </p>
        </div>
    @endforeach
@endsection
