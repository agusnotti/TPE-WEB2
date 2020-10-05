<?php

class CategoriaModel extends Model{

    /**
     * obtiene todas las actegorias
     */
    function getCategorias(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * obtiene categoria por nombre
     */
    function getCategoriaByNombre($nombre){
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE nombre=?");
        $sentencia->execute(array($nombre));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Inserta un categoria en la base de datos
     */
    function insertCategoria($nombre,$id_categoria){
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre, id) VALUES(?,?)");
        $sentencia->execute(array($nombre,$id_categoria));
    }

    /**
     * Elimina un categoria de la base de datos
     */
    function deleteCategoria($id_categoria){
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        $sentencia->execute(array($id_categoria));
    }

    /**
     * Modifica un categoria de la base de datos
     */
    function updateCategoria($nombre, $id_categoria){
        $sentencia = $this->db->prepare('UPDATE categoria SET nombre=? WHERE id=?');
        $sentencia->execute(array($nombre,  $id_categoria));
    }
}