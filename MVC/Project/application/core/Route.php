<?php

namespace MVC\core;

/**
 * PHP version 8.3.3
 * Disctription: Responsible for parse url path
 * and redirect to controller

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Routes;
 * @package  MVC\core;
 * Route
 */
class Route
{
    protected $routes = [];

    protected $params = [];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $arr = include 'Paths.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    /**
     * add Create regular expression from paths
     *
     * @param  mixed $route
     * @param  mixed $params
     * @return void
     */
    public function add($route, $params): void
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }
    /**
     * match Check is these path from url
     *
     * @return bool
     */
    public function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = explode('?', $url)[0];
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    /**
     * Launches application router
     *
     *
     * @return void
     */
    public function run()
    {
        if ($this->match()) {
            $controllerName = "MVC\controllers\\" . 'Controller' . ucfirst($this->params['controller']);
            $path = 'application\controllers\\' . 'Controller' . ucfirst($this->params['controller'] . '.php');
            if (file_exists($path)) {
                $action = 'action' . ucfirst($this->params['action']);
                $controller = new $controllerName($this->params);
                if (method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}
