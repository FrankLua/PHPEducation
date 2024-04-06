<?php

namespace App\Http\Services\User;

use App\Models\Post;
use App\Models\SubUser;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Element;

/**
 * PHP version 8.3.3
 * Disctription: Service response for operations
 * with object 'User'

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Service;
 * @package  App\Http\Services\Post;
 * Route
 */
class UserService
{
    /**
     * saveOne post in database
     *    
     * @return mixed
     */
    public function getAll(): mixed
    {
        return User::all();
    }
    public function getUserById(int $id): mixed
    {
        $authUser = Auth::user();
        $user = User::find($id);
        $sub = SubUser::where('influence_id', $user->id)->where('subscribe_id', $authUser->id)->first();
        $response = [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'isSubscribe' => !!$sub
        ];
        return $response;
    }
    public function getUserByTag(string $tag): mixed
    {
        $user = User::where('tag', $tag)->first();

        return $user;
    }
    public function addOne($user): mixed
    {
        $user = [
            'name' => $user['name'],
            'email' => $user['email'],
            'tag' => explode('@', $user['email'])[0],
            'password' => Hash::make($user['password'])
        ];
        try {
            $model = User::create($user);
            $id = $model->id;
            return $id;
        } catch (Exception $e) {
            abort(500);
        }
    }
    public function subscribeUser($data): mixed
    {
        try {
            SubUser::create($data);
            return $data;
        } catch (Exception $e) {
            abort(500);
        }
    }
    public function unSubcribeUser($data)
    {
        try {
            $subscibe = SubUser::where('influence_id', $data['influence_id'] && 'subscribe_id', $data['subscribe_id'])->first();
            $subscibe->delete();
        } catch (Exception $e) {
            abort(500);
        }
    }
}