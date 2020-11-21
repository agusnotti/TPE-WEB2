<?php

class LoginModel extends Model{

    function getUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM `usuario` WHERE email=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getUsuarios($username = null){
        $sentencia = $this->db->prepare("SELECT * FROM `usuario` WHERE email<>?");
        $sentencia->execute(array($username));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function addUser($username, $password){
        $sentencia = $this->db->prepare("INSERT INTO usuario(email, password) VALUES(?,?)");
        $sentencia->execute(array($username, $password));
    }

    function modificarPermisos($id_user, $permiso){
        $sentencia = $this->db->prepare('UPDATE usuario SET permiso=? WHERE id=?');
        $sentencia->execute(array($permiso, $id_user));
    }

    function deleteUsuario($id_usuario){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id_usuario));
    }


    
}