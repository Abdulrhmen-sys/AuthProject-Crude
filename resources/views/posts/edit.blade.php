@extends('layouts.app')

@section('content')
<div class="container w-50 mx-auto my-5">
    @if ($errors->any())
        <div class="alert alert-danger mx-auto w-75 
            py-2">
            <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>    
            @endforeach
            </ul>
        </div>
    @endif
   <form action="{{route('posts.update' , $post->id)}}" 
   method="POST" 
   enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group my-2">
            <label for="title" class="fw-bolder">Post Title</label>
            <input type="text" name="title" 
            id="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group my-2">
            <label for="content" class="fw-bolder">Post Content</label>
            <textarea name="content" id="content" 
            class="form-control">
            {{$post->content}}
        </textarea>
        </div>
        <div class="form-group my-2">
            <label for="image" class="fw-bolder">Change Image .... </label>
            <img src="../../{{$post->image}}" alt="" class="w-50">
            <input type="file" name="image" id="image" 
             
            class="form-control">
        </div>
        <input type="submit" value="Edit Post"
         class="btn btn-success mt-2">
    </form>
</div>
@endsection