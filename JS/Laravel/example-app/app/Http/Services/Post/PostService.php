<?php

namespace App\Http\Services\Post;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;

/**
 * PHP version 8.3.3
 * Disctription: Service response for operations
 * with object 'Post'

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Service;
 * @package  App\Http\Services\Post;
 * Route
 */
class PostService
{
    /**
     * saveOne post in database
     *
     * @param  mixed $post
     * @return int
     */
    public function saveOne(mixed $post): int
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403);
        }
        $post = [
            "user_id" => $user->id,
            "user_tag" => $user->tag,
            'short_content' => substr($post['content'], 0, 40),
            "title" => $post['title'],
            "content" => $post['content'],
        ];
        try {
            $model = Post::create($post);
            $id = $model->id;
            return $id;
        } catch (Exception $e) {
            abort(500);
        }
    }

    /**
     * getPostByUserId Give post by user id
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getPostByUserId(int $id): mixed
    {
        try {
            return Post::where('user_id', $id)->orderBy('create_data', 'desc')->paginate(5);
        } catch (Exception $e) {
            abort(500);
        }
    }
    /**
     * deletePostById delete post by id
     * also check does it belong to user
     *
     * @param  mixed $id
     * @param  mixed $idUser
     * @return void
     */
    public function deletePostById(int $id, int $idUser)
    {

        $post = Post::find($id);
        if ($post->user_id == $idUser) {
            $post->delete();
        } else {
            abort(403);
        }
    }
    /**
     * getPostByPagination return all post is pagination
     * and sort by date create
     *
     *
     * @return mixed
     */
    public function getPostByPagination(): mixed
    {
        $data = Post::orderBy('create_data', 'desc')->paginate(5);
        return $data;
    }

    /**
     * getOneById return one post by id
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getOneById(int $id): mixed
    {
        try {
            $post = Post::find($id);
            return $post;
        } catch (Exception $e) {
            abort(400);
        }
    }
}
