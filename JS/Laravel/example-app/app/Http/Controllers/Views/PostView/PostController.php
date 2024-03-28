<?php

namespace App\Http\Controllers\Views\PostView;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\View\Components\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * PHP version 8.3.3
 * Disctription: This controller for posts view page
 * It's responseble for render view page for client

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  App\Http\Controllers\PostView\Post;
 * Route
 */
class PostController extends Controller
{
    /**
     * create method for create render view presentation to client
     *
     * @return Factory|View

     */
    public function create()
    {
        return view('post.create');
    }
    /**
     * page method return view page for one posts
     *
     * @return Factory|View
     */
    public function page()
    {

        $id = request('id');
        $data = $this->postService->getOneById($id);
        return view('post.page', compact('data'));
    }

    /**
     * myPosts return post by auth client (outdated)
     *
     * @return Factory|View
     */
    public function myPosts()
    {
        $user = Auth::user();
        if (empty($user)) {
            abort(403);
        }

        $posts = $this->postService->getPostByUserId($user->id);

        return view('post.myPosts', compact('posts'));
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string'
        ]);
        $this->postService->saveOne($data);
        return redirect()->route('main.index');
    }
}