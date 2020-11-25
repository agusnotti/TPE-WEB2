<?php

include_once 'Model.php';

class ComentarioModel extends Model{


    function getComentariosById($id_producto){
        $sentencia = $this->db->prepare('SELECT comentario.*,usuario.nombre as nombre_usuario FROM comentario INNER JOIN usuario ON comentario.id_usuario=usuario.id WHERE id_producto =?');
        $sentencia->execute(array($id_producto));

        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function addComentario($comentario, $puntaje, $id_producto, $id_usuario){
        $sentencia = $this->db->prepare("INSERT INTO comentario(descripcion, puntaje, id_producto, id_usuario) VALUES(?,?,?,?)");
        $sentencia->execute(array($comentario, $puntaje, $id_producto, $id_usuario));
        return $this->db->lastInsertId();
    }

    function deleteComentarioById($id_comentario){
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id=?');
        $sentencia->execute(array($id_comentario));
        return $sentencia->rowCount();
    }

}
