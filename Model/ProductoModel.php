<?php

class ProductoModel extends Model{

    /**
     * obteniene productos por categoria
     */
    function getProductosByCategoria($nombreCategoria, $productoInicial, $productosPorPagina){
        $sentencia = $this->db->prepare("SELECT p.*, c.nombre as nombre_categoria FROM producto p 
        INNER JOIN categoria c ON c.id = p.id_categoria WHERE c.nombre= :nombre_categoria LIMIT :inicio, :cantidad");
        $sentencia->bindParam(":nombre_categoria", $nombreCategoria,PDO::PARAM_STR);
        $sentencia->bindParam(":inicio", $productoInicial, PDO::PARAM_INT);
        $sentencia->bindParam(":cantidad", $productosPorPagina, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * obtiene un producto por id
     */    
    function getProductoById($id_producto){
        $sentencia = $this->db->prepare("SELECT * FROM `producto` p WHERE id=?");
        $sentencia->execute(array($id_producto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /**
     * obtiene todos los productos
     */
    function getProductos($productoInicial, $productosPorPagina){
        $sentencia = $this->db->prepare("SELECT p.*, c.nombre as nombre_categoria FROM producto p INNER JOIN categoria c ON c.id = p.id_categoria  LIMIT :inicio , :cantidad");
        $sentencia->bindParam(":inicio", $productoInicial, PDO::PARAM_INT);
        $sentencia->bindParam(":cantidad", $productosPorPagina, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function countProductos($id_categoria = null){
        if(isset($id_categoria)){
            $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_categoria = ?");
        } else {
            $sentencia = $this->db->prepare("SELECT * FROM producto");
        }
        $sentencia->execute(array($id_categoria));
        return $sentencia->rowCount();
    }

    /**
     * Inserta un producto en la base de datos
     */
    function insertProducto($nombre,$descripcion,$tamano,$precio,$id_categoria,$img = null){        
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, descripcion, tamano, precio, id_categoria, imagen) VALUES(?,?,?,?,?,?)");
        $sentencia->execute(array($nombre,$descripcion,$tamano,$precio,$id_categoria,$pathImg));
    }

    private function uploadImage($image){
        $target = 'images/productos/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    /**
     * Elimina un producto de la base de datos
     */
    function deleteProducto($id_producto){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($id_producto));
    }

    /**
     * Modifica un producto de la base de datos
     */
    function updateProducto($id_producto, $nombre, $descripcion, $tamano, $precio, $id_categoria, $img = null){
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare('UPDATE producto SET nombre=?, descripcion=?, tamano=?, precio=?, id_categoria=?, imagen=? WHERE id=?');
        $sentencia->execute(array($nombre, $descripcion, $tamano, doubleval($precio), $id_categoria, $pathImg, $id_producto));
    }
}