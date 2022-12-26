@extends('layouts.article')

@section('pageTitle', $article->title)

@section('main')
    <p class="text-lg text-gray-700 p-2">{{ $article->content }}</p>
    <a href="{{ route('articles.index') }}">回文章列表</a>
@endsection
