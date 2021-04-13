@extends('layouts.app')

@section('content')
<ul class="list-group">
    @foreach ($posts as $post)
        <div class="card mb-2">
            <div class="card-header">
                <a class="card-body" href="/posts/{{$post->id}}"><strong>{{ $post->title }}</strong></a><br>
            </div>
            <div class="card-body">
                {{ $post->body }}<br>
            </div>
            <div class="card-footer">
                <p>Witten <b>{{ $post->created_at->diffForHumans() }}</b> by <b>author</b></p>
            </div>
        </div>          
    @endforeach
</ul>
  
@endsection