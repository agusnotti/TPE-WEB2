<?php


class CategoriaController extends UserController{
   
    function __construct(){
        parent::__construct();      
    }
    /**
     * Obtiene los datos necesarios para visualizar la tabla de productos por categoria
     */
    function Categoria($params = null){
        $nombre = $params[':nombreCategoria'];
        $productos=$this->productoModel->getProductosByCategoria($nombre);
        $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);
        $categorias = $this->categoriaModel->getCategorias();
        $isUserLogged = $this->isLogged();
        $isAdmin = $this->isAdmin();
        $this->categoriaView->showCategoria($productos, $categorias, $categoria, $isUserLogged, $isAdmin);
    }

    /**
     * crea un nuevo categoria en base a datos ingresados por formulario
     */
    function InsertCategoria(){
        $nombre = $_POST['nombre_categoria'];
        $categoria=$this->categoriaModel->getCategoriaByNombre($nombre);
        if(!$categoria){
            if($_FILES['img-categoria']['type'] == "image/jpg" || $_FILES['img-categoria']['type'] == "image/jpeg"  || $_FILES['img-categoria']['type'] == "image/png") {
                $this->categoriaModel->insertCategoria($nombre, $_FILES['img-categoria']['tmp_name']);
                $this->categoriaView->ShowLocation('administrador/categorias');
            } else {
                $this->categoriaModel->insertCategoria($nombre);
                $this->categoriaView->ShowLocation('administrador/categorias');
            }
        }        
    }

    /**
     * Elimina un categoria
     */
    function DeleteCategoria($id_categoria = null){
        $id = $id_categoria[':ID'];
        $this->categoriaModel->deleteCategoria($id);
        $this->categoriaView->ShowLocation('administrador/categorias');
    }

    /**
     * modifica un categoria
     */
    function UpdateCategoria($id_categoria = null){
        $id = $id_categoria[':ID'];
        $nombre = $_POST['nombre_categoria'];
        if($_FILES['img-categoria']['type'] == "image/jpg" || $_FILES['img-categoria']['type'] == "image/jpeg"  || $_FILES['img-categoria']['type'] == "image/png") {
            $this->categoriaModel->updateCategoria($id, $nombre, $_FILES['img-categoria']['tmp_name']);
            $this->categoriaView->ShowLocation('administrador/categorias');
        } else {
            $this->categoriaModel->updateCategoria($id, $nombre);
            $this->categoriaView->ShowLocation('administrador/categorias');
        }
    }
}