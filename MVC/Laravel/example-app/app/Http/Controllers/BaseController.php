<?php

namespace App\Http\Controllers;

use App\Services\Post\PostService;

abstract class BaseController
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
}