<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{
    //show all posts
    function list(){
        //select all posts
        $posts=Post::get();
        return view('Post',[
            'posts'=>$posts
        ]);
    }

    //show post details
    function show($id){
        //select post with id=$id
        $post=Post::where('id','=',$id)->first();
        return view('postDetails',[
            'post'=>$post
        ]);
    }
    //create new post
    function create(){
        return view('create');
    }
    //store new post in DB
    function store(Request $request){
        //validation
        $validator=\Validator::make($request->all(),[
            'title'=>'required|max:100|min:3',
            'content'=>'required|min:3',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return redirect('posts/create')
            ->withErrors($validator)
            ->withInput();
        }
        //handle image
        if ($request->hasFile('image'))
        {
            $image = $request->file('image'); 
            $name = time().\Str::random(30).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/images'); 
            $image->move($destinationPath, $name); $imageName='images/'.$name; 
        }
        //extract data
        $_title=$request->title;
        $_description=$request->description;
        $_content=$request->content;
        //insert data
        $post=new Post();
        $post->title=$_title;
        $post->content=$_content;
        //Add Admin ID to the post
        $post->user_id=Auth::user()->id;
        //insert image 
        $post->image=$imageName;
        $post->save();
        //redirect 3la ay 7eta
        return redirect('/posts');
    }

    //update
    function edit($id){
        $post=Post::find($id);
        return view('edit',[
            'post'=>$post
        ]);
    }
    //update data in DB
    function update($id,Request $request){
        //validation
        $validator=\Validator::make($request->all(),[
            'title'=>'required|max:100|min:3',
            'content'=>'required|min:3',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return redirect('posts/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //extract data
        $_title=$request->title;
        $_content=$request->content;
        //select post with $id
        $post=Post::find($id);
        $post->title=$_title;
        $post->content=$_content;
        //handel Image
        if($request->hasFile('image')){
            $image=$request->file('image');
            $name=time().\Str::random(30).'.'.$image->getClientOriginalExtension();
            $destinationPath=\public_path('/images');
            $image->move($destinationPath,$name);
            $imageName='/images'.$name;

            //check if has image
            if(isset($post->image)){
                unlink($post->image);

            $post->image=$imageName;
            }
        }
        $post->save();
        return redirect('posts/details/'.$id);
    }

    //delete
    function delete($id){
        $post=Post::find($id);

        if(isset($post->image)){
            unlink($post->image);
        }
        $post->delete();
        return redirect('posts/');
    }
}

