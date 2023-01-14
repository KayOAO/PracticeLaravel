@extends('layouts.homepage')

@section('pageTitle', '編輯文章')

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
    <h6 class="mt-5 mb-3 text-center">Edit Article</h6>
    <hr>
    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-row">
            <div class="col-sm-12 form-group">
                <label>標題</label>
                <input type="text" name="title" value="{{ $article->title }}" class="form-control">
            </div>

            <div class="col-12 form-group">
                <label>內文</label>
                <textarea name="content" cols="30" rows="10" class="form-control">{{ $article->content }}</textarea>
            </div>

            <div class="col-sm-12 form-group">
                <label>Tags</label>
                <select name='tags[]' multiple class="form-control">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $article->tags->contains($tag) ? 'selected' : '' }}>
                            {{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-primary rounded btn-block">Update Article</button>
            </div>
        </div>
    </form>
@endsection
