@extends('layouts.app')
 
@section('content')
<div class="card col-md-12 mx-auto">
  {{-- <div class="card-header">
    Featured
  </div> --}}
  <div class="card-header">
    <h1>Create Post</h1>
  </div>
  <div class="card-body">

      <form action="/posts" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="title">Title</label>
              <input class="form-control" placeholder="title" type="text" name="title" id="text">
          </div>
          <div class="form-group">
              <label for="body">Body</label>
              <textarea name="body" id="body" class="form-control" placeholder="Body content" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group ">
              <input type="file" name="cover_image" id="image">
          </div>
          <div class="form-group">
              <input class="btn btn-primary" type="submit" value="Publish Post">
          </div>
      </form>
  </div>
</div>
@endsection