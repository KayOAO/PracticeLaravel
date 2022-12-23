@extends('layouts.article')

@section('main')
    <h1 class="font-thin text-4xl">列表頁</h1>
    <a href="{{ route('articles.create') }}">新增文章</a>
@endsection