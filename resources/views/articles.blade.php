@extends('layout.app')
@section('content')

    @foreach($articles as $article)
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{$article->title}}</h3>
                <div class="mb-1 text-muted">{{$article->created_at}}</div>
                <p class="card-text mb-auto">
                    {{$article->text}}
                    <a href="/articles/{{$article->slug}}" class="stretched-link">Continue reading</a>
                </p>
                <div class="pt-2">
                    @foreach($article->tags as $tag)
                        <span class="badge badge-success mr-2">{{$tag->name}}</span>
                    @endforeach
                </div>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="https://via.placeholder.com/200" class="bd-placeholder-img">
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col">{{ $articles->onEachSide(5)->links('vendor.pagination.bootstrap-4') }}</div>
    </div>
@endsection
