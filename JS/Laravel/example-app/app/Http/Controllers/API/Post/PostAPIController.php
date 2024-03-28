<?php

namespace App\Http\Controllers\API\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

/**
 * PHP version 8.3.3
 * Disctription: This controller for posts api
 * It's responseble for CRUD post, and return ajax

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  App\Http\Controllers\API\Post;
 */
class PostAPIController extends Controller
{
    /**
     * getPosts return json all posts with pagination (5)
     *
     * @return void
     */
    public function getPosts()
    {
        $posts = $this->postService->getPostByPagination();
        return view('post.postsList', compact('posts'))->render();
    }

    /**
     * getMyPosts return json, posts by client, with pagination (5)
     *
     * @return void
     */
    public function getMyPosts()
    {
        $user = Auth::user();
        if (empty($user)) {
            abort(403);
        }
        $posts = $this->postService->getPostByUserId($user->id);
        return view('post.myPostsUpdate', compact('posts'))->render();
    }

    /**
     * store create postst, validate, inset in DB
     *
     * @param  mixed $request
     * @return void
     */
    public function store(HttpRequest $request)
    {
        $data = $request->validate([
            'content' => 'required',
            'title' => 'required|max:255',
        ]);
        $id = $this->postService->saveOne($data);
        return response()->json(['id' => $id], 201);
    }

    /**
     * destroy Delete post in DB by id
     *
     * @return void code status
     */
    public function destroy()
    {
        $user = Auth::user();
        if (empty($user)) {
            abort(403);
        }
        $id = request('id');
        $this->postService->deletePostById($id, $user->id);
        return response()->json([], 204);
    }
}
