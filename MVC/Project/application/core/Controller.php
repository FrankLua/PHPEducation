<?php

namespace MVC\core;

/**
 * PHP version 8.3.3
 * Disctription: This base abstract class for controllers

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  MVC\application\core;
 */
abstract class Controller
{
    public $model;
    public $view;
    public array $route;
    public $acl;

    /**
     * __construct
     *
     * @param  mixed $route
     * @return void
     */
    public function __construct($route)
    {
        $this->route = $route;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($route);
    }
    /**
     * checkAcl This method validation - allow the method
     * form controller the client.
     *
     * @return bool
     */
    public function checkAcl(): bool
    {
        $this->acl = include 'application/acl/' . $this->route['controller'] . '.php';
        if ($this->isAcl('all')) {
            return true;
        }
        if (isset($_SESSION['authorize'])) {
            if ($this->isAcl('authorize')) {
                return true;
            } elseif ($_SESSION['role'] == 'admin' && $this->isAcl('admin')) {
                return true;
            }
        }
        return false;
    }

    /**
     * isAcl This method checks if the contoller action
     * allow for everone not authorized
     *
     *
     * @param  mixed $key
     * @return bool
     */
    public function isAcl($key): bool
    {
        $action = $this->route['action'];
        $result = in_array($action, $this->acl[$key]);
        return $result;
    }
}
