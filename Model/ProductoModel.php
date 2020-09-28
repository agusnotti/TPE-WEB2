<?php

class ProductoModel extends Model{

    function getProductosByCategoria($nombreCategoria){
        $sentencia = $this->db->prepare("SELECT p.*, c.nombre as nombre_categoria FROM producto p INNER JOIN categoria c ON c.id = p.id_categoria WHERE c.nombre=?");
        $sentencia->execute(array($nombreCategoria));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductoById($id_producto){
        $sentencia = $this->db->prepare("SELECT * FROM `producto` p WHERE id=?");
        $sentencia->execute(array($id_producto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getProductos(){
        $sentencia = $this->db->prepare("SELECT p.*, c.nombre as nombre_categoria FROM producto p INNER JOIN categoria c ON c.id = p.id_categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function insertProducto($nombre,$descripcion,$tamano,$precio,$id_categoria){
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, descripcion, tamano, precio,id_categoria) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($nombre,$descripcion,$tamano,$precio,$id_categoria));
    }

    function deleteProducto($id_producto){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($id_producto));
    }
}