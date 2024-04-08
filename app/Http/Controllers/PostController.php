<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::latest()->simplePaginate();
        return view('posts.home' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required' ,
            'image' =>'required|image|mimes:jpg,jpeg,png,svg|max:3072' ,
            'content' => 'required' 
        ]);
        $postInput = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images';
            $fileEx = $image->getClientOriginalExtension();
            $imgName =time() . '.' . $fileEx;
            $postInput['image'] = $image->move($destinationPath , $imgName);
        }
    Post::create($postInput);
    return redirect()->route('posts.index') ->with('success' , 'Post Added Successfully' );
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('posts.showe' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit' , compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'title' => 'required' ,
            'image' =>'required|image|mimes:jpg,jpeg,png,svg|max:3072' ,
            'content' => 'required' 
        ]);
        $postInput = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images';
            $fileEx = $image->getClientOriginalExtension();
            $imgName =time() . '.' . $fileEx;
            $postInput['image'] = $image->move($destinationPath , $imgName);
        }else{
            unset($postInput['image']);
        }
    $post->update($postInput);
    return redirect()->route('posts.index') ->with('success' , 'Post Added Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if(File::exists(public_path('images'))){
         File::delete(public_path($post->image));
        }
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success' , 'post Deleted Successfully');

    }
}
