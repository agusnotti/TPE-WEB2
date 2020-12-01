<?php

class ProductoController extends UserController{

    function __construct(){
        parent::__construct();      
    }
    /**
     * Obtiene los datos necesarios para visualizar el detalle del producto
     */
    function Producto($params = null){ //parametros que vienen de la url
        if(isset($params[':nombreCategoria']) && isset($params[':ID'])){
            $nombre = $params[':nombreCategoria'];
            $productoID = $params[':ID'];
            $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);

            if($categoria && isset($categoria->id)){
                $producto = $this->productoModel->getProductoById($productoID);

                if($producto && isset($producto->id)){
                    $categorias = $this->categoriaModel->getCategorias();
                    $isUserLogged = $this->isLogged();
                    $isAdmin = $this->isAdmin();
                    $id= $this->getLoggedUserId();
                    $userName= $this->getLoggedUser();
                    $this->productoView->showProducto($categorias, $producto, $categoria, $isUserLogged, $isAdmin,$id,$userName);
                }else{
                    $this->view->ShowLocation('home');
                }
            }else{
                $this->view->ShowLocation('home');
            }
        } else {
            $this->view->ShowLocation('home');
        }
    }

    /**
     * crea un nuevo producto en base a datos ingresados por formulario
     */
    function InsertProducto(){
        
        if(isset($_POST['Nombre_Producto']) && isset($_POST['Descripcion']) && isset($_POST['Descripcion']) && isset($_POST['Tamano']) && isset($_POST['Precio'])){
            $nombre = $_POST['Nombre_Producto'];
            $descripcion = $_POST['Descripcion'];
            $tamano = $_POST['Tamano'];
            $precio = $_POST['Precio'];
            $categoria=$this->categoriaModel->getCategoriaByNombre($_POST['eleccion']);
            if($_FILES['img-producto']['type'] == "image/jpg" || $_FILES['img-producto']['type'] == "image/jpeg"  || $_FILES['img-producto']['type'] == "image/png") {
                $this->productoModel->insertProducto($nombre,$descripcion,$tamano,$precio, $categoria->id, $_FILES['img-producto']['tmp_name']);
            } else {
                $this->productoModel->insertProducto($nombre,$descripcion,$tamano,$precio,$categoria->id);
            }
        }

        $this->view->ShowLocation('administrador/productos');
    }    

    /**
     * Elimina un producto
     */
    function DeleteProducto($id_producto = null){
        if(isset($id_producto[':ID'])){
            $id = $id_producto[':ID'];
            $this->productoModel->deleteProducto($id);
        }
        $this->view->ShowLocation('administrador/productos');
    }

    /**
     * modifica un producto
     */
    function UpdateProducto($id_producto = null){
        if(isset($id_producto[':ID']) && isset($_POST['Nombre_Producto']) && isset($_POST['Descripcion']) && isset($_POST['Descripcion']) && isset($_POST['Tamano']) && isset($_POST['Precio'])){
            $id = $id_producto[':ID'];
            $nombre = $_POST['Nombre_Producto'];
            $descripcion = $_POST['Descripcion'];
            $tamano = $_POST['Tamano'];
            $precio = $_POST['Precio'];
            $categoria=$this->categoriaModel->getCategoriaByNombre($_POST['eleccion']);
            if($_FILES['img-producto']['type'] == "image/jpg" || $_FILES['img-producto']['type'] == "image/jpeg"  || $_FILES['img-producto']['type'] == "image/png") {
                $this->productoModel->updateProducto($id, $nombre,$descripcion,$tamano,$precio, $categoria->id, $_FILES['img-producto']['tmp_name']);
            } else {
                $this->productoModel->updateProducto($id, $nombre,$descripcion,$tamano,$precio,$categoria->id);
            }
        }

        $this->view->ShowLocation('administrador/productos');
    }
}
