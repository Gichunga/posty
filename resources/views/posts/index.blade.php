@extends('layouts.app')

@section('content')
<ul class="list-group">
    @foreach ($posts as $post)
        <li class="list-group-item mb-2">
            <b>{{ $post->title }}</b><br>
            {{ $post->body }}<br>
            {{ $post->created_at->diffForHumans() }}
        </li>          
    @endforeach
</ul>
  
@endsection