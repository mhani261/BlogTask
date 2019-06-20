<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $categories = Category::all();
        return view('frontend.posts.postDetails',compact('post','categories'));
    }
}
