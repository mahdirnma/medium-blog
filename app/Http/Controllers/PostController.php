<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('can:isAdmin')->only(['publish','index','create','store','edit','update','destroy']);
    }
    public function publish(Post $post)
    {
        if ($post->published==1)
            $post->update(['published'=>0]);
        else
            $post->update(['published'=>1]);
        return redirect()->back();
    }
    public function index()
    {
        $posts = Post::where('is_active',1)->paginate(2);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active',1)->get();
        $tags = Tag::where('is_active',1)->get();
        $writers=User::where('role',2)->get();
        return view('admin.posts.create',compact('tags','categories','writers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post=Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'user_id'=>$request->writer_id
        ]);
        if($post){
            $post->tags()->attach($request->tags);
            return redirect()->route('posts.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::where('is_active',1)->get();
        $tags = Tag::where('is_active',1)->get();
        $writers=User::where('role',2)->get();
        return view('admin.posts.edit',compact('post','tags','categories','writers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $status=$post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'user_id'=>$request->writer_id
        ]);
        if($status){
            $post->tags()->sync($request->tags);
            return redirect()->route('posts.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->update(['is_active'=>0]);
        return redirect()->route('posts.index');
    }
}
