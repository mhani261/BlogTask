<?php

namespace App\Http\Controllers\AdminPanel;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $list=Category::all();
        return view('adminpanel.categories.index', compact('list'));
    }

    public function create()
    {
        return view('adminpanel.categories.create');
    }

    public function store(CategoryCreateRequest $request,CategoryService $categoryService)
    {
        $categoryService->create($request->validatied());
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category=Category::FindOrFail($id);
        return view('adminpanel.categories.edit',compact('category'));
    }

    public function update($id,CategoryService $categoryService,CategoryCreateRequest $request)
    {
        $categoryService->update($id,$request->validatied());
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Category::FindOrFail($id)->delete();
        return redirect()->route('categories.index');
    }
}
