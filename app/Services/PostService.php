<?php

namespace App\Services;


use App\Post;

class PostService
{
    private $postModel;
    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }

    public function create()
    {
        $this->postModel->create([
            'category_id' =>  request('category'),
            'title' =>  request('title'),
            'details' =>  request('details'),
            'description' =>  request('description')
        ]);
    }

    public function update($id)
    {
        $post=$this->postModel::FindOrFail($id);
        $post->category_id = request('category');
        $post->title = request('title');
        $post->details = request('details');
        $post->description = request('description');
        $post->save();
    }

}