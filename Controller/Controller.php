<?php

require_once "./Model/CategoriaModel.php";
require_once "./Model/ProductoModel.php";
require_once "./View/ProductoView.php";
require_once "./View/CategoriaView.php";


class Controller{
    protected $view;
    protected $categoriaModel;
    protected $productoModel;
    protected $productoView;
    protected $categoriaView;

    function __construct(){
        $this->categoriaModel = new CategoriaModel();
        $this->productoModel = new ProductoModel();
        $this->view = new View();
        $this->productoView = new ProductoView();
        $this->categoriaView = new CategoriaView();
    }

    
}