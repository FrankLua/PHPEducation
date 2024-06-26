<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

/**
 * PHP version 8.3.3
 * Disctription: This controller for user api
 * It's responseble for CRUD user, Vue

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  App\Http\Controllers\API\Post;
 */
class UserController extends Controller
{

    /**
     * getUsers return json all users
     *
     * @return void
     */
    public function getUsers()
    {
        return $this->userService->getAll();
    }
    /**
     * getUserById
     *
     * @return void
     */
    public function getUserById()
    {
        $id = request('id');
        return $this->userService->getUserById($id);
    }
    /**
     * subscribeUser
     *
     * @param  mixed $request
     * @return void
     */
    public function subscribeUser(HttpRequest $request)
    {
        $request = $request->validate([
            'influence_id' => 'required',
        ]);
        $params = [
            'influence_id' => $request['influence_id'],
            'subscribe_id' => Auth::user()->id
        ];

        $result = $this->userService->subscribeUser($params);


        return $result;
    }
    /**
     * unSubscribeUser
     *
     * @return mixed
     */
    public function unSubscribeUser(HttpRequest $request): mixed
    {
        $request = $request->validate([
            'influence_id' => 'required',
        ]);
        $params = [
            'influence_id' => $request['influence_id'],
            'subscribe_id' => Auth::user()->id
        ];

        $this->userService->unSubcribeUser($params);

        return response(status: 204);
    }



}