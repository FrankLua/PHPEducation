<?php

namespace App\Http\Services\Post;

use App\Helpers\Sort;
use App\Models\Post;
use App\Models\PostHash;
use App\Models\PostTag;
use App\Models\SubUser;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $post = [
            "user_id" => $user->id,
            "user_tag" => $user->tag,
            'short_content' => substr($post['content'], 0, 40),
            "title" => $post['title'],
            "content" => $post['content'],
        ];

        $tags = $this->findWord($post['content'], '@');
        $hash = $this->findWord($post['content'], '#');



        try {
            $model = Post::create($post);
            $id = $model->id;
            $this->setTag($tags, $id);
            $this->setHash($hash, $id);
            return $id;
        } catch (Exception $e) {
            abort(500);
        }
    }
    private function setTag(array $tags, int $postId)
    {
        foreach ($tags as $tag) {
            $data = [
                'user_tag' => $tag,
                'post_id' => $postId,
            ];
            PostTag::create($data);
        }
        ;
    }
    private function setHash(array $hashs, int $postId)
    {
        foreach ($hashs as $hashs) {
            $data = [
                'hash_tag' => $hashs,
                'post_id' => $postId,
            ];
            PostHash::create($data);
        }
        ;

    }
    private function findWord(string $targetString, string $targetChar): array
    {
        /* */
        $pieces = preg_replace('/\s+/', ' ', $targetString);
        $pieces = explode(" ", $pieces);
        $result = [];
        foreach ($pieces as $word) {

            if ($word[0] == $targetChar)
                $result[] = substr($word, 1);
        }
        return array_unique($result);
    }
    public function getPostByUser(int $id, string $tag)
    {
        $postUser = $this->getByUserId($id);
        $postByTag = $this->getPostByTag($tag);
        $result = array_merge($postByTag, $postUser);
        return $this->prepareResult($result);
    }
    public function getPostByHash(string $hash)
    {
        $post_hashes = PostHash::where('hash_tag', $hash)
            ->select('post_id')
            ->get()
            ->toArray();
        $result = Post::whereIn('id', $post_hashes)
            ->orderBy('create_date')
            ->get()
            ->toArray();
        return $result;
    }
    private function prepareResult($result)
    {

        $result = array_unique($result, SORT_REGULAR);
        $result = Sort::sortPostByTime($result);
        $result = array_slice($result, 0, 30);
        return $result;
    }

    /**
     * getPostByUserId Give post by user id
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getMyNews(int $id, string $userTag): mixed
    {

        $postUser = $this->getByUserId($id);
        $subScribePost = $this->getSubscribePost($id);
        $postWhereMe = $this->getPostByTag($userTag);
        $result = array_merge($postUser, $subScribePost, $postWhereMe);
        $result = array_unique($result, SORT_REGULAR);
        $result = Sort::sortPostByTime($result);


        return array_slice($result, 0, 30);
    }
    function timeSort($a, $b)
    {
        return strtotime($a['create_date']) - strtotime($b['create_date']);
    }
    private function getPostByTag($userTag)
    {
        $result = [];
        $postTags = PostTag::where('user_tag', $userTag)->get();

        foreach ($postTags as $item) {
            $result = array_merge(Post::where('id', $item['post_id'])->get()->toArray(), $result);
        }
        return $result;

    }
    private function getSubscribePost(int $id): array
    {
        $result = [];
        $subscribes = SubUser::where('subscribe_id', $id)
            ->get();
        foreach ($subscribes as $item) {
            $result = array_merge(Post::where('user_id', $item['influence_id'])
                ->get()
                ->toArray(), $result);
        }
        ;
        return $result;

    }
    public function getByUserId(int $id): mixed
    {
        try {
            return Post::where('user_id', $id)->get()->toArray();
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