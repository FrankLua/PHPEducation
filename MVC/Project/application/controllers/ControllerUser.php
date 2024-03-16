<?php

namespace MVC\controllers;

use Exception;
use MVC\core\Controller;
use MVC\models\classes\User;
use MVC\models\ModelUser;

/**
 * PHP version 8.3.3
 * Disctription: This main controller

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\application\core;
 * Route
 */
class ControllerUser extends Controller
{
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->model = new ModelUser();
    }
    public function actionIndex()
    {
        $this->view->generate('mainView.php', 'layOut.php');
    }

    public function actionLogin()
    {
        return $this->view->generate('Login.html', 'layOut.php'); 
    }
    private function auth(User $user)
    {
        $_SESSION['authorize'] = true;
        $_SESSION['email'] = $user->username;
        $_SESSION['role'] = $user->role;
    }
    public function actionLoginPost()
    {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            try{
               $user = $this->model->getDataByEmail($email);
               if($user->password != $pass){
                $this->view->errorCode(403);
               }
            } catch (Exception $e) {
                $this->view->errorCode(403);
            }
            $this->auth($user);            
            $this->actionIndex();                 
        }
        else {
            $this->view->errorCode(400);
        }
    }
    public function actionReg()
    {
        return $this->view->generate('RegView.html', 'layOut.php'); 
    }
    public function actionRegPost()
    {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            
            try{
                $user = $this->model->setData($email, $pass);
            } catch (Exception $e) {
                $this->view->errorCode(400);
            }
            if($user != null) {
                $this->auth($user);
            }            
            $this->actionIndex();            
        }
        else {
            $this->view->errorCode(400);
        }
    }
    public function actionLogout()
    {
        unset($_SESSION['authorize'], $_SESSION['email'],$_SESSION['role']);
        $this->view->redirect('application/views/mainView.php');
    }
}