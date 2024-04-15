@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @if ($successMsg = Session::get('success'))
            <div class="alert w-50 mx-auto
             alert-success my-2 text-center">
                {{$successMsg}}
            </div>
             @endif
        <h2 class="bg-warning w-50 mx-auto shadow-2
        rounded py-4 fw-bolder my-5 text-center">
            Lastes Posts
        </h2>
        <table class="my-5 table-bordered text-center table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>titel</th>
                    <th>content</th>
                    <th>image</th>
                    <th>acthion</th>
                </tr>
            </thead>
     @if(count($posts) > 0)
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>
                        <img src="{{$post->image}}" alt="" style="width:150px">
                    </td>
                    <td>
                        <a href="{{route('posts.show' , $post->id)}}" class="btn btn-sm btn-primary mx-1 my-5">showe</a>
                        <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-sm btn-success mx-1 my-5">edit</a>
                        <form action="{{route('posts.destroy' , $post->id)}}"
                            method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                        class="btn btn-danger btn-sm mt-2">delete</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
            @endif
        </table>
        </div>
    </div>
</div>
@endsection
