<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreWriterPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCotroller extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $user=Auth::user();
        $writerId=$user->id;
        $posts = Post::where('is_active',1)->where('user_id',$writerId)->paginate(2);
        return view('writers.index',compact('posts'));
    }
    public function create(){
        $categories = Category::where('is_active',1)->get();
        $tags = Tag::where('is_active',1)->get();
        return view('writers.create',compact('categories','tags'));
    }
    public function store(StoreWriterPostRequest $request){
        $user=Auth::user();
        $post=Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'user_id'=>$user->id
        ]);
        if($post){
            $post->tags()->attach($request->tags);
            return redirect()->route('writer.posts.index');
        }
        return redirect()->back();
    }
}
