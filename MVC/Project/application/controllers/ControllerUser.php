<?php

namespace MVC\controllers;

use Exception;
use MVC\core\Controller;

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
    public function actionIndex()
    {
        $this->view->generate('mainView.php', 'layOut.php');
    }

    public function actionLogin()
    {
        return $this->view->generate('Login.html', 'layOut.php'); 
    }
    public function actionLoginPost()
    {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            try{
                $this->model->getData($email, $pass);
            } catch (Exception $e) {
                $this->view->errorCode(403);
            }
            setcookie('login', $email ,  time() + 1800,'/');                    
            $this->view->redirect("application/views/mainView.php");                  
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
                $this->model->setData($email, $pass);
            } catch (Exception $e) {
                $this->view->errorCode(400);
            } 
            setcookie('login', $email ,  time() + 1800,'/');                   
            $this->view->redirect("application/views/mainView.php");            
        }
        else {
            $this->view->errorCode(400);
        }
    }
    public function actionLogout()
    {
        unset($_SESSION['login']);
        $this->view->redirect('application/views/mainView.php');
    }
}