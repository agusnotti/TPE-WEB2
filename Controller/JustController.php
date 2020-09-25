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
        $productos=$this->model->getProductos();
        $categorias = $this->model->getCategorias();
        $this->view->showPage('home', $categorias, $productos);
    }

    function Categoria($nombreCategoria = null){
        $nombre = $nombreCategoria[':nombreCategoria'];
        $productos=$this->model->getProductosByCategoria($nombre);
        $categorias = $this->model->getCategorias();
        $this->view->showPage('categoria',$categorias, $productos);
    }

    function Producto(){
        $categorias = $this->model->getCategorias();
        $this->view->showPage('producto', $categorias);
    }

    function Login(){
        $this->view->showLogin();
    }


    function InsertProducto(){
        $categorias=$this->model->getIdCategoriaByNombre($_POST['eleccion']);
        $this->model->insertProducto($_POST['Nombre_Producto'],$_POST['Descripcion'],$_POST['Tamano'],$_POST['Precio'],$categorias[0]->id);
        $this->view->ShowHomeLocation('categoria');
    }

    function DeleteProducto($id_producto = null){
        $id = $id_producto[':ID'];
        $this->model->deleteProducto($id);
        $this->view->ShowHomeLocation('categoria');
    }
}


?>