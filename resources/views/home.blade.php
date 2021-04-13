@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <a href="/posts/create" class="btn btn-sm btn-primary">Create Post <i class="fas fa-edit"></i></a>
                            <h2 class="border-bottom">{{ __('Your Blog Posts') }}</h2>
                            @if (count($posts) > 0)
                                <table class="table table-striped">
                                    <tr class="table-header">
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th colspan="2" class="justify-content-center">Update | Delete</th>
                                    </tr>
                                    @foreach ($posts as $post)
                                        <tr class="table-body">
                                            
                                                <td><a class="text-dark" href="posts/{{$post->id}}">{{ $post->title }}</a></td>
                                                <td><a class="text-dark" href="posts/{{$post->id}}">{{ substr($post->body, 0, strpos($post->body, ' ', 100)) }}..[...]</a></td>
                                         
                                            <td><a class="btn  btn-primary" href="/posts/{{$post->id}}/edit">Edit</a></td>
                                            <td>
                                                <form action="/posts/{{$post->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit"  class="btn btn-danger  pull-right" value="DELETE">
                                                </form>
                                        </tr>
                                    @endforeach  
                                </table>
                            @else
                                <h3 class="ml-4 mt-3"><i class="fas fa-exclamation-triangle red fa-fw"></i>{{ __('No posts found') }}</h3>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
