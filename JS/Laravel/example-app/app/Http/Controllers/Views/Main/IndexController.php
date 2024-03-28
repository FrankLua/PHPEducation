<?php

namespace App\Http\Controllers\Views\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * PHP version 8.3.3
 * Disctription: This controller for Index View (outdate)
 * It's responseble for render view page for client

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  App\Http\Controllers\PostView\Post;
 * Route
 */
class IndexController extends Controller
{
    /**
     * index had retured all posts
     *
     * @return 
     */
    public function index()
    {
        return view('main.index');
    }
}