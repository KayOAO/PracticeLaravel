@extends('layouts.article')

@section('pageTitle','文章 > 新增文章')

@section('main')
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="field my-2">
            <label for="">標題</label>
            <input type="text" name="title" class="border border-gray-300 p-2">
        </div>

        <div class="field my-2">
            <label for="">內文</label>
            <textarea name="content" cols="30" rows="10" class="border border-gray-300 p-2"></textarea>
        </div>
        
        <div class="actions">
            <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">新增文章</button>
        </div>
    </form>
@endsection