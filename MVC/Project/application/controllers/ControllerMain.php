<?php

namespace MVC\controllers;

use MVC\core\Controller;

/**
 * PHP version 8.3.3
 * Disctription: This main controller responsible for
 * main action on site

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controllers;
 * @package  MVC\application\controllers;
 */

class ControllerMain extends Controller
{
    /**
     * __construct
     *
     * @param  mixed $router
     * @return void
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }
    /**
     * actionIndex - This main action page site
     * this collected all information about site.
     *
     * @return void
     */
    public function actionIndex(): void
    {
        $this->view->generate('mainView.php', 'layOut.php');
    }
}
