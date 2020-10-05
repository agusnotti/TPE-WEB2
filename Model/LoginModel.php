<?php

class LoginModel extends Model{

    function getUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM `usuario` WHERE email=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    
}