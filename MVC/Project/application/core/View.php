<?php

namespace MVC\core;

/**
 * PHP version 8.3.3
 * Disctription: This base class responsible for view page and
 * Redirect

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Views;
 * @package  MVC\application\core;
 * Route
 */
class View
{
    public $path;
    public $route;
    public $layout = 'default';

    /**
     * __construct
     *
     * @param  mixed $route
     * @return void
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /**
     * redirect - redurect to page.
     *
     * @param  mixed $url
     * @return void
     */
    public function redirect($url): void
    {
        header('location: /' . $url);
    }

    /**
     * generate Default View page by src path
     *
     * @param  mixed $contentView
     * @param  mixed $layOut
     * @param  mixed $data
     * @return void
     */
    public function generate($contentView, $layOut, $data = null): void
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include 'application/views/' .  $layOut;
    }
    /**
     * errorCode generate page error
     *
     * @param  mixed $code
     * @return void
     */
    public static function errorCode($code): void
    {
        http_response_code($code);
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            include $path;
        }
        exit;
    }
}
