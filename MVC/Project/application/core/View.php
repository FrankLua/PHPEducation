<?php

namespace MVC\core;

/**
 * PHP version 8.3.3
 * Disctription: This base class need to for rendering internet
 * page

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Views;
 * @package  MVC\application\core;
 * Route
 */
class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.
	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function redirect($url) {
		header('location: /'.$url);
	}

	public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

	public function location($url) {
		exit(json_encode(['url' => $url]));
	}
    public function generate($contentView, $layOut, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include 'application/views/' .  $layOut;
    }
    public static function errorCode($code) {
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}
}
