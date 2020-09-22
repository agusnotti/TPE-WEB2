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
        
        $this->view->showPage('home');

    }

    function Categoria(){
         $productos=$this->model->getProductos();
         $this->view->showPage('categoria',$productos);
    }

    function Producto(){
         $this->view->showPage('producto');
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