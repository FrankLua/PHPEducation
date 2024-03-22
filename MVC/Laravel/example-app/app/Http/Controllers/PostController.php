<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Support\Common;

class PostController extends BaseController
{
    public function index()
    {
        $data = Post::all();
        dd($data);
        return view('posts', compact('data'));
    }
    public function create()
    {
        return view('post.create');
    }

    public function store()
    {

        $data = request()->validate(
            [
                'title' => 'string',
                'content' => 'string',
            ]
        );
        
        Post::create($data)

    }

}