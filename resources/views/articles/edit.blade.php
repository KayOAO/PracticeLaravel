@extends('layouts.article')

@section('pageTitle', '文章 > 編輯文章')

@section('main')
    @if ($errors->any())
        <div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('patch')
        <div class="field my-2">
            <label for="">標題</label>
            <input type="text" name="title" value="{{ $article->title }}" class="border border-gray-300 p-2">
        </div>

        <div class="field my-2">
            <label for="">內文</label>
            <textarea name="content" cols="30" rows="10" class="border border-gray-300 p-2">{{ $article->content }}</textarea>
        </div>

        <div class="actions">
            <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">更新文章</button>
        </div>
    </form>
@endsection
