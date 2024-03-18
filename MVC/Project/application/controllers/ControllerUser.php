<?php

namespace MVC\controllers;

use Exception;
use MVC\core\Controller;
use MVC\core\Route;
use MVC\models\classes\User;
use MVC\models\ModelUser;

/**
 * PHP version 8.3.3
 * Disctription: This controller resposeble for
 * Auth user
 * Registration user
 * Login user

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Controller;
 * @package  MVC\application\controller;
 * Route
 */
class ControllerUser extends Controller
{
    /**
     * __construct
     *
     * @param  mixed $route
     * @return void
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new ModelUser();
    }
    /**
     * actionRedirectMainPage responsible for redirect on main Page
     *
     * @return void
     */
    private function actionRedirectMainPage(): void
    {
        $this->view->generate('mainView.php', 'layOut.php');
    }

    /**
     * actionLogin View form for login
     *
     * @return void
     */
    public function actionLogin(): void
    {
        $this->view->generate('Login.html', 'layOut.php');
    }
    /**
     * auth Responsible for client auth
     * give client sessions status
     *
     * @param  mixed $user
     * @return void
     */
    private function auth(User $user): void
    {
        $_SESSION['authorize'] = true;
        $_SESSION['email'] = $user->username;
        $_SESSION['role'] = $user->role;
    }
    /**
     * actionLoginPost Responsible for validation
     * data which give client on server
     * Validate data
     * Auth the client if data is successful
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function actionLoginPost(): void
    {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $user = $this->model->logUser($email, $pass);
            $this->auth($user);
            $this->actionRedirectMainPage();
        } else {
            $this->view->errorCode(400);
        }
    }
    /**
     * actionReg View registration page
     *
     * @return void
     */
    public function actionReg(): void
    {
        $this->view->generate('RegView.html', 'layOut.php');
    }
    /**
     * actionRegPost Responsibe for registration the client.
     * Validate data
     * Auth the client if data is successful
     *
     * @return void
     */
    public function actionRegPost(): void
    {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $user = $this->model->setData($email, $pass);
            $this->auth($user);
            $this->actionRedirectMainPage();
        } else {
            $this->view->errorCode(400);
        }
    }
    /**
     * actionLogout Unset the Client auntification
     *
     * @return void
     */
    public function actionLogout(): void
    {
        unset($_SESSION['authorize'], $_SESSION['email'], $_SESSION['role']);
        $this->actionRedirectMainPage();
    }
}
