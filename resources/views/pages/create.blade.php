@extends('layouts.app')

@section('content')
<button class="btn btn-primary" data-toggle="modal" data-target="#createPost">Create Post<i class="fas fa-pen-fancy fa-md fa-fw red"></i></button>
<div class="modal fade" id="createPost" tabindex="-1" role="dialog" aria-labelledby="userModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"  id="postModalTitle">Create Post </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">
                    <!-- title -->
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name"
                            class="form-control">
                    </div>
                    <!-- end title -->

                    <!-- body -->
                    <div class="form-group">
                        <textarea  name="body" id="body" placeholder="Description for post" class="form-control"></textarea>
                    </div>
                    <!-- end body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-primary">Create  <i class="fas fa-user-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection