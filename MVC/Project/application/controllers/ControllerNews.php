<?php

namespace MVC\controllers;

use MVC\core\Controller;
use MVC\core\View;
use MVC\models\ModelNews;
use MVC\models\viewsModels\NewsView;

/**
 * PHP version 8.3.3
 * Disctription: This News controller
 * It's responseble for CRUD news, and them display to client

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  MVC\application\controller;
 * Route
 */
class ControllerNews extends Controller
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
        $this->model = new ModelNews();
    }
    /**
     * actionIndex View all news
     *
     * @return void
     */
    public function actionIndex(): void
    {

        if (!isset($_GET['id'])) {
            $actualPage = 0;
        } else {
            $actualPage = htmlspecialchars($_GET['id']);
        }
        $countRows = $this->model->getCountRows();
        $news = $this->model->getData($actualPage);
        $data = new NewsView($countRows, $news, $actualPage);
        $this->view->generate('NewsView.php', 'layOut.php', $data);
    }
    /**
     * actionCreate - View page for create news
     * allowed only role - admin
     *
     * @return void
     */
    public function actionCreate()
    {
        $this->view->generate('NewsCreate.html', 'layOut.php');
    }
    /**
     * actionCreatePost - Create object in DB if it valid
     *
     *
     * @return void
     */
    public function actionCreatePost(): void
    {
        if (empty($_POST['title'] || empty($_POST['content']))) {
            $this->view->errorCode(400);
        }
        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);
        $author = $_SESSION['email'];
        $date = date('Y-m-d H:i:s');
        $this->model->setData($title, $content, $author, $date);
        $this->actionIndex();
    }
    /**
     * actionPage View only one news by id
     *
     * @return void
     */
    public function actionPage(): void
    {
        $pageId = htmlspecialchars($_GET['id']);
        $data = $this->model->selectOne($pageId);
        $this->view->generate('NewsPage.php', 'layOut.php', $data);
    }
}
