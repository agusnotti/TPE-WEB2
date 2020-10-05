<?php


class CategoriaController extends Controller{
   

    /**
     * Obtiene los datos necesarios para visualizar la tabla de productos por categoria
     */
    function Categoria($params = null){
        $nombre = $params[':nombreCategoria'];
        $productos=$this->productoModel->getProductosByCategoria($nombre);
        $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);
        $categorias = $this->categoriaModel->getCategorias();
        $this->categoriaView->showCategoria($productos, $categorias, $categoria);
    }

    /**
     * crea un nuevo categoria en base a datos ingresados por formulario
     */
    function InsertCategoria(){
        $nombre = $_POST['nombre_categoria'];
        $categoria=$this->categoriaModel->getCategoriaByNombre($nombre);
        $this->categoriaModel->insertCategoria($nombre,$categoria->id);
        $this->categoriaView->ShowLocation('administrador/categorias');
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
        $this->categoriaModel->updateCategoria($nombre, $id);
        $this->categoriaView->ShowLocation('administrador/categorias');
    }
}