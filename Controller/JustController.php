<?php

require_once "./View/JustView.php";
require_once "./Model/JustModel.php";

class JustController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new JustView();
        $this->model = new JustModel();

    }

    function Home(){
        
        echo $this->view->showPage('home');
    }
}


?>