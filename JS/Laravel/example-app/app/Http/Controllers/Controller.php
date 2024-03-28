<?php

namespace App\Http\Controllers;

use App\Http\Services\Post\PostService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * PHP version 8.3.3
 * Disctription: This main controller
 * from it extends other controllers

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  App\Http\Controllers;
 * Route
 */
class Controller extends BaseController
{
    protected PostService $postService;

    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * __construct dependency injection services
     *
     * @param  mixed $postServ
     * @return void
     */
    public function __construct(PostService $postServ)
    {
        $this->postService = $postServ;
    }
}
