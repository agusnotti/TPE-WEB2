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
    function insertCategoria($nombre, $img = null){
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre, imagen) VALUES(?,?)");
        $sentencia->execute(array($nombre,$pathImg));
    }

    private function uploadImage($image){
        $target = 'images/categorias/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
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
    function updateCategoria($id_categoria, $nombre,$img = null ){        
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre=?, imagen=? WHERE id=?");
        $sentencia->execute(array($nombre, $pathImg, intval($id_categoria)));

    }
}