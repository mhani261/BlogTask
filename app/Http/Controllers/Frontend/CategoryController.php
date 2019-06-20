<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $categories = Category::all();
        $category = Category::with('posts')->findOrFail($category)->first();
        return view('frontend.categories.categoryPosts',compact('category','categories'));
    }
}
