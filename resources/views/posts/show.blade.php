@extends('layouts.app')

@section('content')
    {{ $post->title }}<br>
    {{ $post->body }}
@endsection