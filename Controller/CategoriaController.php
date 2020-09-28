<?php


class CategoriaController extends Controller{
   

    function Categoria($params = null){
        $nombre = $params[':nombreCategoria'];
        $productos=$this->productoModel->getProductosByCategoria($nombre);
        $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);
        $categorias = $this->categoriaModel->getCategorias();
        $this->categoriaView->showCategoria($productos, $categorias, $categoria);
    }
}