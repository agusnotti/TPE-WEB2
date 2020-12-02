<?php
require_once "./Controller/LoginController.php";

class Helper
{
    private $loginController;

    function __construct()
    {
        $this->loginController= new LoginController();
    }


    function checkLoggedIn(){
        $this->loginController->checkLoggedIn();
    }

    function isLogged(){
        return $this->loginController->isLogged();
    }

    function isAdmin(){
        return $this->loginController->isAdmin();
    }

    function getLoggedUsername(){
        return $this->loginController->getLoggedUsername();
    }

    function getLoggedUser(){
        return $this->loginController->getLoggedUser();
    }

    function getLoggedUserId(){
        return $this->loginController->getLoggedUserId();
    }
}
