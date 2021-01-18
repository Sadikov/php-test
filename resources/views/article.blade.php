@extends('layout.app')
@section('scripts')
    <script src="/js/article.js"></script>
@endsection
@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <div class="blog-post">
                    <img src="https://via.placeholder.com/400" class="img-fluid" alt="Responsive image">
                    <h2 class="blog-post-title">{{$article->title}}</h2>
                    <p class="blog-post-meta">{{$article->created_at}}</p>
                    {{$article->text}}
                    <div class="pt-4 d-flex flex-row justify-content-between">
                        <span>views: <span class="viewsCount">@if($article->views) {{$article->views->count}} @else 0 @endif</span></span>
                        <button type="button" class="btn btn-primary" id="likeBtn">
                            Like <span class="badge badge-light likesCount">@if($article->likes) {{$article->likes->count}} @else 0 @endif</span>
                        </button>
                    </div>
                </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->
        </div><!-- /.row -->
        <div class="row pt-4">
            <div class="col comment-form">
                <form>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="hidden" value="{{$article->id}}" id="articleId">
                        <input type="text" class="form-control" id="subject" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <textarea class="form-control" id="text"></textarea>
                    </div>
                    <button type="button" id="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col comment-success" style="display: none">
                Ваше сообщение успешно отправлено
            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                @foreach($article->comments as $comment)
                    <div class="mb-3">
                        <b>{{$comment->subject}}</b>
                        <p>{{$comment->text}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
