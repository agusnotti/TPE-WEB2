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
        $this->view->showHome($categorias, $productos);
    }

    function Categoria($params = null){
        $nombre = $params[':nombreCategoria'];
        $productos=$this->model->getProductosByCategoria($nombre);
        $categoria = $this->model->getCategoriaByNombre($nombre);
        $categorias = $this->model->getCategorias();
        $this->view->showCategoria($productos, $categorias, $categoria);
    }

    function Producto($params = null){ //parametros que vienen de la url
        $nombre = $params[':nombreCategoria'];
        $productoID = $params[':ID'];
        $categoria = $this->model->getCategoriaByNombre($nombre);
        $producto = $this->model->getProductoById($productoID);
        $categorias = $this->model->getCategorias();
        $this->view->showProducto($categorias, $producto, $categoria);
    }

    function Login(){
        $this->view->showLogin();
    }


    function InsertProducto(){
        $categoria=$this->model->getCategoriaByNombre($_POST['eleccion']);
        $this->model->insertProducto($_POST['Nombre_Producto'],$_POST['Descripcion'],$_POST['Tamano'],$_POST['Precio'],$categoria->id);
        $this->view->ShowHomeLocation('categoria');
    }

    function DeleteProducto($id_producto = null){
        $id = $id_producto[':ID'];
        $this->model->deleteProducto($id);
        $this->view->ShowHomeLocation('categoria');
    }
}


?>