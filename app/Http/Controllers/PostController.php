<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;

use App\Models\Post;

class PostController extends Controller
{
  public function index() {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
  }

  public function create(){
    return view('posts.create');
  }

  public function edit($id) 
  {
   $posts = Post::find($id);
   return view('posts.edit',compact('posts'));
  }

  public function store(PostRequest $request) {
    $post = new post();
    $post ->title = $request-> title;
    $post ->body = $request-> body;
    $post ->created_at = now();
    $post ->updated_at = now();
    $post ->save();
    return redirect('/posts');
  
  }

  public function show(PostRequest $request,$id) 
  {
   $posts = Post::find($id);
   return view('posts.show', compact('posts'));
  }

  public function update(PostRequest $request,$id)  
  {
   $post = Post::find($id);
   $post ->title = $request-> title;
   $post ->body = $request-> body;
   $post->updated_at=now();
   $post->save();

   return "Post Updated";
  }

  public function destroy($id) 
  {
    POST::destroy($id);
  //  $post = Post::find($id);
  //  $post ->delete();   
   return redirect('/posts');
  }

  public function myValidate($request){
    $request->validate([
      'title'=> 'required',
      'body' => 'required | min:5'
    ]);
  }
}


