<?php

class ProductoController extends Controller{


    /**
     * Obtiene los datos necesarios para visualizar el detalle del producto
     */
    function Producto($params = null){ //parametros que vienen de la url
        $nombre = $params[':nombreCategoria'];
        $productoID = $params[':ID'];
        $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);
        $producto = $this->productoModel->getProductoById($productoID);
        $categorias = $this->categoriaModel->getCategorias();
        $this->productoView->showProducto($categorias, $producto, $categoria);
    }

    /**
     * crea un nuevo producto en base a datos ingresados por formulario
     */
    function InsertProducto(){
        $nombre = $_POST['Nombre_Producto'];
        $descripcion = $_POST['Descripcion'];
        $tamano = $_POST['Tamano'];
        $precio = $_POST['Precio'];
        $categoria=$this->categoriaModel->getCategoriaByNombre($_POST['eleccion']);
        $this->productoModel->insertProducto($nombre,$descripcion,$tamano,$precio,$categoria->id);
        $this->productoView->ShowLocation('administrador/productos');
    }

    /**
     * Elimina un producto
     */
    function DeleteProducto($id_producto = null){
        $id = $id_producto[':ID'];
        $this->productoModel->deleteProducto($id);
        $this->productoView->ShowLocation('administrador/productos');
    }

    function UpdateProducto($id_producto = null){
        $id = $id_producto[':ID'];
        $nombre = $_POST['Nombre_Producto'];
        $descripcion = $_POST['Descripcion'];
        $tamano = $_POST['Tamano'];
        $precio = $_POST['Precio'];
        $categoria=$this->categoriaModel->getCategoriaByNombre($_POST['eleccion']);
        $this->productoModel->updateProducto($id, $nombre, $descripcion, $tamano, $precio, $categoria->id);
        $this->productoView->ShowLocation('administrador/productos');
    }
}