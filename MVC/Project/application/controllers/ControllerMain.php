<?php

namespace MVC\controllers;

use MVC\core\Controller;

/**
 * PHP version 8.3.3
 * Disctription: This main controller

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\application\core;
 * Route
 */
class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $this->view->generate('mainView.php', 'layOut.php');
    }
}
