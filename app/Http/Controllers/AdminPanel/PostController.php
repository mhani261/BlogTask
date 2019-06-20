<?php

namespace App\Http\Controllers\AdminPanel;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
        $list=Post::with('category')->get();
        return view('adminpanel.posts.index', compact('list'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('adminpanel.posts.create' , compact('categories'));
    }

    public function store(PostCreateRequest $request,PostService $postService)
    {
        $postService->create($request->validatied());
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $categories=Category::all();
        $post=Post::FindOrFail($id);
        return view('adminpanel.posts.edit',compact('categories','post'));
    }

    /**
     * @param $id
     * @param PostService $postService
     * @param PostCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id,PostService $postService,PostCreateRequest $request)
    {
        $postService->update($id,$request->validatied());
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::FindOrFail($id)->delete();
        return redirect()->route('posts.index');
    }
}
