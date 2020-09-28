<?php
require_once "./Model/AdministradorModel.php";
require_once "./View/AdministradorView.php";

class AdministradorController extends Controller{

    private $loginView;
    private $loginModel;

    function __construct(){
        $this->loginView = new AdministradorView();
        $this->loginModel = new AdministradorModel();
    }

    function Login(){
        $this->loginView->showLogin();
    }
}