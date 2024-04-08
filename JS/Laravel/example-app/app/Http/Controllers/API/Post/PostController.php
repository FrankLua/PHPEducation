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
    public function getById(HttpRequest $request)
    {
        $request = $request->validate([
            'id' => 'required',
        ]);
        return $this->postService->getOneById($request['id']);
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
    /**
     * getPostByUser
     *
     * @return mixed
     */
    public function getPostByUser(HttpRequest $request): mixed
    {
        $request = $request->validate([
            'tag' => 'required|max:255',
        ]);

        $user = $this->userService->getUserByTag($request['tag']);

        if ($user == null) {
            return response(null, 404);
        }

        return $this->postService->getPostByUser($user->id, $user->tag);
    }

    /**
     * getPostByHash
     *
     * @return mixed
     */
    public function getPostByHash(HttpRequest $request): mixed
    {
        $request = $request->validate([
            'hash_tag' => 'required|max:255',
        ]);

        $result = $this->postService->getPostByHash($request['hash_tag']);


        if (count($result) == 0) {
            return response(null, 404);
        }

        return $result;
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
    public function destroy(HttpRequest $request)
    {

        $request = $request->validate([
            'id' => 'required|max:255',
        ]);
        $user = Auth::user();
        $this->postService->deletePostById($request['id'], $user->id);
        return response()->json([], 204);
    }
}
