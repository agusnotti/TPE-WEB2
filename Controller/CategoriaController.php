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
}