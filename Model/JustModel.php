<?php

class JustModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_just;charset=utf8', 'root', '');
    }

    function getCategorias(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getIdCategoriaByNombre($nombre){
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE nombre=?");
        $sentencia->execute(array($nombre));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getProductos(){
        $sentencia = $this->db->prepare("SELECT * FROM producto");
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

?>