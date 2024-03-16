<?php

namespace MVC\core;

/**
 * PHP version 8.3.3
 * Disctription: This base class for controllers

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  MVC\application\core;
 * Route
 */
class Controller
{
    public $model;
    public $view;
	public array $route;
	public $acl;

	public function __construct($route) {
		$this->route = $route;
		if (!$this->checkAcl()) {
			View::errorCode(403);
		}
		$this->view = new View($route);
	}

	public function loadModel($name) {
		$path = 'MVC\models\\' . 'Model' . ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	public function checkAcl() {
		$this->acl = require 'application/acl/'.$this->route['controller'].'.php';
		if ($this->isAcl('all')) {
			return true;
		}
		if(isset($_SESSION['authorize'])) {
			if($this->isAcl('authorize')) {
				return true;
			} elseif ($_SESSION['role'] == 'admin' && $this->isAcl('admin')) {
				return true;
			}			
		}
		return false;
	}

	public function isAcl($key): bool {
        $action = $this->route['action'];
        $result = in_array($action, $this->acl[$key]);
		return $result;
	}
}
