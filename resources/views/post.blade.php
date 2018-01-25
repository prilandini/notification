@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                Title
                <input type="text" name="title" class="form-control" autofocus>
            </div>
            <div class="form-group">
                Body
                <textarea name="body"  class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Post</button>
            </div>
        </form>

        <hr>
        
        @foreach($posts as $post)
            <div class="alert alert-secondary">
                <div><strong>{{ $post->title }}</strong></div>
                <div class="mx-right"><small class="text-muted">{{ $post->created_at->toDayDateTimeString() }}</small></div>
                <div class="pt-2">{{ $post->body }}</div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection