<?php

namespace App\Http\Services\Post;

use App\Helpers\Sort;
use App\Models\HashTag;
use App\Models\Post;
use App\Models\PostHash;
use App\Models\PostTag;
use App\Models\SubUser;
use App\Models\User;
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
            'short_content' => mb_substr($post['content'], 0, 40, 'UTF-8'),
            "title" => $post['title'],
            "content" => $post['content'],
        ];

        $tags = $this->findWord($post['content'], '@');
        $hash = $this->findWord($post['content'], '#');



        try {
            $model = Post::create($post);
            $id = $model->id;

            try {

                $this->setTag($tags, $id);

                $this->setHash($hash, $id);
            } catch (Exception $e) {
                $model->delete();
                throw new Exception('', 400);
            }
            return $id;
        } catch (Exception $e) {

            $code = $e->getCode();
            abort($code);
        }
    }
    /**
     * setTag
     *
     * @param  mixed $tags
     * @param  mixed $postId
     * @return void
     */
    private function setTag(array $tags, int $postId)
    {
        foreach ($tags as $tag) {
            $data = [
                'user_tag' => $tag,
                'post_id' => $postId,
            ];

            PostTag::create($data);

        }
    }
    /**
     * setHash
     *
     * @param  mixed $hashs
     * @param  mixed $postId
     * @return void
     */
    private function setHash(array $hashs, int $postId)
    {
        foreach ($hashs as $hashs) {
            $data = [
                'hashtag' => $hashs,
            ];
            $hashtags = HashTag::createOrFirst($data);

            $dataForPostHashes = [
                'hashtag_id' => $hashtags->id,
                'post_id' => $postId
            ];
            PostHash::createOrFirst($dataForPostHashes);
        }
        ;

    }
    /**
     * findWord
     *
     * @param  mixed $targetString
     * @param  mixed $targetChar
     * @return array
     */
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
    /**
     * getPostByHash
     *
     * @param  mixed $hash
     * @return void
     */
    public function getPostByHash(string $hash)
    {
        $result = [];
        try {
            $hashTag = HashTag::where('hashtag', $hash)
                ->first();
            if ($hashTag == null) {
                throw new Exception('', 404);
            }

            foreach ($hashTag->hashTags as $post_hash) {
                $result[] = $post_hash->post->toArray();
            }

            if (count($result) == 0) {
                throw new Exception('', 404);
            }
            return $result;
        } catch (Exception $e) {
            $code = $e->getCode();
            abort($code);
        }


    }

    /**
     * getPostByUserId Give post by user id
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getMyNews(int $id, string $userTag): mixed
    {

        $postUser = Auth::user()->posts->toArray();
        $subScribePost = $this->getSubscribePost($id);
        $postWhereMe = $this->getPostByTag($userTag);
        $result = array_merge($postUser, $subScribePost, $postWhereMe);
        $result = array_unique($result, SORT_REGULAR);
        Sort::sortPostByTime($result);


        return array_slice($result, 0, 30);
    }
    /**
     * getPostByTag
     *
     * @param  mixed $userTag
     * @return void
     */
    private function getPostByTag($userTag)
    {
        $result = [];
        $postTags = PostTag::where('user_tag', $userTag)
            ->get();

        foreach ($postTags as $postTag) {
            $result = [$postTag->post->toArray()];
        }
        return $result;

    }
    /**
     * getSubscribePost
     *
     * @param  mixed $id
     * @return array
     */
    private function getSubscribePost(int $id): array
    {
        $result = [];
        $subscribes = SubUser::where('subscribe_id', $id)
            ->get();
        foreach ($subscribes as $subscribe) {
            $result = $subscribe->influenceUser->posts->toArray();
        }
        ;
        return $result;

    }
    /**
     * getByUserId
     *
     * @param  mixed $id
     * @return mixed
     */
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