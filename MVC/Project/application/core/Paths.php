<?php

/**
 * PHP version 8.3.3
 * Disctription: Paths for router
 *

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Router;
 * @package  MVC\application\core;
 */

return [

    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'News' => [
        'controller' => 'News',
        'action' => 'Index',
    ],
    'News/Page' => [
        'controller' => 'News',
        'action' => 'Page',
    ],

    'News/Create' => [
        'controller' => 'News',
        'action' => 'Create',
    ],
    'News/CreatePost' => [
        'controller' => 'News',
        'action' => 'CreatePost',
    ],
    'User/Reg' => [
        'controller' => 'User',
        'action' => 'Reg',
    ],
    'User/RegPost' => [
        'controller' => 'User',
        'action' => 'RegPost',
    ],
    'User/LogOut' => [
        'controller' => 'User',
        'action' => 'LogOut',
    ],
    'User/Login' => [
        'controller' => 'User',
        'action' => 'Login',
    ],
    'User/LoginPost' => [
        'controller' => 'User',
        'action' => 'LoginPost',
    ]

];
