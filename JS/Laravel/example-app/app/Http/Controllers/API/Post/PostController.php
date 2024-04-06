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
class PostController extends Controller
{
    /**
     * getPosts return json all posts with pagination (5)
     *
     * @return void
     */
    public function getById()
    {
        $id = request()->query('id');
        return $this->postService->getOneById($id);
        //return view('post.postsList', compact('posts'))->render(); For views old version
    }
    /**
     * getMyPosts return json, posts by client, with pagination (5)
     *
     * @return void
     */
    public function getMainPost()
    {
        $user = Auth::user();
        $posts = $this->postService->getMyNews($user->id, $user->tag);
        return response()->json($posts);
    }
    public function getPostByUser()
    {
        $reqest = request()->query('tag');

        $user = $this->userService->getUserByTag($reqest);

        return $this->postService->getPostByUser($user->id, $user->tag);
    }

    public function getPostByHash()
    {
        $reqest = request(['hash_tag']);

        return $this->postService->getPostByHash($reqest['hash_tag']);
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