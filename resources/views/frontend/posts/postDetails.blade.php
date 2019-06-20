@extends('frontend.partials.index')
@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->created_at}}</p>

        <p>{{$post->description}}</p>
        <hr>
        <p>{{$post->details}}</p>
    </div>
@endsection