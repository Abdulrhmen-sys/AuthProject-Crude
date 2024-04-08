@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @if ($errors->any())
            <div class="alert alert-danger mx-auto w-75 ">
                <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>    
                @endforeach
                </ul>
            </div>
        @endif
        <h2 class="bg-warning w-50 mx-auto shadow-2
        rounded py-4 fw-bolder my-5 text-center">
            Create Post
        </h2>
        <div class="my-5 w-75 mx-auto">
            <form action="{{route('posts.store')}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-2">
                <label for="title">title</label>
                <input type="text" 
                class="form-control" id="title" name="title">
            </div>
            <div class="form-group my-2">
                <label for="content">content</label>
                <textarea 
                class="form-control" id="content" name="content"></textarea>
            </div>
            <div class="form-group my-2">
                <label for="image">image</label>
                <input type="file" 
                class="form-control" id="image" name="image">
            </div>
            <input type="submit" value="Add post" class="btn btn-warning mt-2">
           </form>
        </div>
        </div>
    </div>
</div>
@endsection