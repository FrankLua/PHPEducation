<?php

namespace MVC\core;

/**
 * PHP version 8.3.3
 * Disctription: Call methods in controller

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Routes;
 * @package  MVC\application\core;
 * Route
 */
class Route
{ 
    protected $routes = [];

    protected $params = [];

    // получаем хранилище
    function __construct() {
        $arr = require 'Paths.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }
    
    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }
    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function run(){
        if ($this->match()) {
            $controllerName = "MVC\controllers\\" .'Controller' . ucfirst($this->params['controller']);
            $path = 'application\controllers\\'.'Controller' . ucfirst($this->params['controller'] . '.php');
            if (file_exists($path)) {
                $action = 'action'. ucfirst($this->params['action']);
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


    /**
     * start
     *
     * @return void
     */
    public static function start(): void
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'Index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $model_name = 'Model' . $controller_name;
        $controller_name = 'Controller' . $controller_name;
        $action_name = 'action' . $action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = $model_name . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::errorPage404();
        }
        // создаем контроллер
        $controller_name = "MVC\controllers\\" . $controller_name;
        $controller = new  $controller_name();
        $action = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::errorPage404();
        }
    }
    /**
     * errorPage404
     *
     * @return void
     */
    public static function errorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('Location:' . $host . 'application/views/404View.php');
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        die('<h1>Not found</h1>');
    }
}
