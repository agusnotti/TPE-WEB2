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

    /**
     * Obtiene los datos necesarios para mostrar en el home las diferentes categorias 
     * y la tabla con la cantidad total de productos
     */
    function Home(){        
        $productos=$this->productoModel->getProductos();
        $categorias = $this->categoriaModel->getCategorias();
        $this->view->showHome($categorias, $productos);
    }
}