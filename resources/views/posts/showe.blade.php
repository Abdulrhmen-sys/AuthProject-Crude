@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
       
        <div class="col-md-9">
            <h2 class="bg-warning w-50 mx-auto shadow-2 
            rounded-3 py-3 fw-bolder my-5 text-center">
                Post Details
            </h2>
           
            <div class="bg-light border rounded-5 shadow-4 text-center
             my-5 w-75 mx-auto py-5">
                <img src="../{{$post->image}}" alt="" style="width : 75%">
                <h2 class="mt-3 mb-2"> {{$post->title}} </h2>
                <hr class="w-75 border-2 mx-auto">
                <p>
                    {{$post->content}}
                </p>
                <a href="{{route('posts.index')}}" 
                class="mt-3 btn btn-dark">Return to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
