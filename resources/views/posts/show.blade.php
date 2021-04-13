@extends('layouts.app')

@section('content')
<ul class="list-group">
    <div class="card mb-2">
        <div class="card-header">
            <h5>{{ $post->title }}</h5>
           
        </div>
        <div class="card-body">
           {{$post->body}}
        </div>
        <div class="card-footer">
            <p>By <b>{{ $post->user->name }}</b> {{ $post->created_at->diffForHumans() }}</p>
            @if (!Auth::guest())
                @if (Auth::user()->name === $post->user->name)
                    <span>
                        <form action="/posts/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit"  class="btn btn-danger btn-sm pull-right" value="DELETE">
                        </form><a class="card-body" href="/posts/{{$post->id}}">
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm d-inline">Edit <i class="fas fa-edit"></i></a>    
                    </span>
                @endif
            @endif
        </div>
    </div>          
</ul>
  
@endsection