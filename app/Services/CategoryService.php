<?php

namespace App\Services;
use App\Category;

class CategoryService
{
    private $categoryModel;
    public function __construct(Category $category)
    {
        $this->categoryModel= $category;
    }

    public function create()
    {
        $this->categoryModel->create([
            'title' =>  request('title'),
        ]);
    }

    public function update($id)
    {
        $category=$this->categoryModel::FindOrFail($id);
        $category->title = request('title');
        $category->save();
    }

}