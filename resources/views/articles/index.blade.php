@extends('layouts.article')

@section('pageTitle','列表頁')
@section('main')
    <a href="{{ route('articles.create') }}">新增文章</a>
@endsection