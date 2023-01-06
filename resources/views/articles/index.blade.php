@extends('layouts.homepage')

@section('pageTitle', 'Blog')
@section('main')

    <hr>
    <div class="page-container">
        <div class="page-content">
            @forelse ($articles as $article)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <small class="small text-muted">{{ $article->created_at->format('Y/m/d') }}
                            <span class="px-2">-</span>
                            <a href="#" class="text-muted">32 Comments</a>
                            <span class="px-2">-</span>
                            <a href="{{ route('articles.index', ['author' => $article->user->id]) }}"
                                class="text-dark small text-muted">By {{ $article->user->name }}</a>
                        </small>
                    </div>
                    <div class="card-body">
                        {{-- <div class="blog-media">
                            <img src="assets/imgs/blog-6.jpg" alt="" class="w-100">
                            <a href="#" class="badge badge-primary">#Salupt</a>
                        </div> --}}
                        <p class="my-3">{{ $article->content }}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-dark btn-sm">
                            READ MORE
                        </a>
                    </div>
                </div>
                <hr>
            @empty
                <p>No relevant articles yet.</p>
            @endforelse

            @if (count($articles) > 0)
                {{ $articles->links() }}
            @endif
        </div>

        <!-- Sidebar -->
        <div class="page-sidebar text-center">
            <h6 class="sidebar-title section-title mb-4 mt-3">About</h6>
            <img src="assets/imgs/avatar.jpg" alt="" class="circle-100 mb-3">
            <div class="socials mb-3 mt-2">
                <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
                <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
                <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
                <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
            </div>
            <p>Consectetur adipisicing elit Possimus tempore facilis dolorum veniam impedit nobis. Quia, soluta
                incidunt nesciunt dolorem reiciendis iusto.</p>

            <h6 class="sidebar-title mt-5 mb-4">Tags</h6>
            @foreach ($tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag->name]) }}"
                    class="badge badge-pill badge-primary">{{ $tag->name }}</a>
            @endforeach

        </div>
        {{-- <a href="{{ route('articles.create') }}">新增文章</a>
    @foreach ($articles as $article)
        <div class="border-t border-gray-300 my-1 p-2">
            <h3 class="font-bold text-lg">
                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
            </h3>
            <p>{{ $article->created_at }} 由 {{ $article->user->name }} 發表 </p>

            <div class="flex">
                <a class="mr-2" href="{{ route('articles.edit', $article) }}">編輯</a>
                <form action="{{ route('articles.destroy', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-2 rounded bg-red-500 text-red-100">刪除</button>
                </form>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }} --}}
    @endsection
