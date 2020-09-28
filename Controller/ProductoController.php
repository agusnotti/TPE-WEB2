<?php

class ProductoController extends Controller{


    function Producto($params = null){ //parametros que vienen de la url
        $nombre = $params[':nombreCategoria'];
        $productoID = $params[':ID'];
        $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);
        $producto = $this->productoModel->getProductoById($productoID);
        $categorias = $this->categoriaModel->getCategorias();
        $this->productoView->showProducto($categorias, $producto, $categoria);
    }

    function InsertProducto(){
        $categoria=$this->categoriaModel->getCategoriaByNombre($_POST['eleccion']);
        $this->productoModel->insertProducto($_POST['Nombre_Producto'],$_POST['Descripcion'],$_POST['Tamano'],$_POST['Precio'],$categoria->id);
        $this->productoView->ShowHomeLocation('categoria');
    }

    function DeleteProducto($id_producto = null){
        $id = $id_producto[':ID'];
        $this->productoModel->deleteProducto($id);
        $this->productoView->ShowHomeLocation('categoria');
    }
}