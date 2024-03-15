<?php

namespace MVC\controllers;

use MVC\core\Controller;

/**
 * PHP version 8.3.3
 * Disctription: This controller answers on news content
 * on site

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\application\core;
 * Route
 */
class ControllerNews extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
    }
    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('NewsView.php', 'layOut.php',$data);
    }
    public function actionCreate()
    {
        $this->view->generate('NewsCreate.html', 'layOut.php');
    }
    public function actionCreatePost()
    {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $author = "Anonimous";
        $this->model->setData($title,$content,$author);
        $this->actionIndex();        
    }

}