<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::with('category')->get();
        return view('frontend.posts.homePagePosts',compact('categories','posts'));
    }
}
