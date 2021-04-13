@extends('layouts.app')

@section('content')
<ul class="list-group">
    <div class="card mb-2">
        <div class="card-header">
            <a class="card-body" href="/posts/{{$post->id}}"><h5>{{ $post->title }}</h5></a><br>
           
        </div>
        <div class="card-body">
            {{ $post->body }}<br>
        </div>
        <div class="card-footer">
            <p>Witten <b>{{ $post->created_at->diffForHumans() }}</b> by <b>author</b></p>
            <span>
                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit"  class="btn btn-danger btn-sm pull-right" value="DELETE">
                </form>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm d-inline">Edit <i class="fas fa-edit"></i></a>    
            </span>
        </div>
    </div>          
</ul>
  
@endsection