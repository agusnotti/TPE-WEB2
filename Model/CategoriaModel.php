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
}