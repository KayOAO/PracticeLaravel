@extends('layouts.article')

@section('pageTitle', '文章 > 新增文章')

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
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="field my-2">
            <label for="">標題</label>
            <input type="text" name="title" value="{{ old('title') }}" class="border border-gray-300 p-2">
        </div>

        <div class="field my-2">
            <label for="">內文</label>
            <textarea name="content" cols="30" rows="10" class="border border-gray-300 p-2">{{ old('content') }}</textarea>
        </div>

        <div class="actions">
            <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">新增文章</button>
        </div>
    </form>
@endsection
