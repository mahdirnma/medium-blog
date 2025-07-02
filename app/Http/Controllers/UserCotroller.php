<?php

namespace App\Http\Controllers;

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
        $categories = Category::where('is_active',1)->get();
        $tags = Tag::where('is_active',1)->get();
        $posts = Post::where('is_active',1)->where('user_id',$writerId)->paginate(2);
        return view('writers.index',compact('posts','categories','tags'));
    }
}
