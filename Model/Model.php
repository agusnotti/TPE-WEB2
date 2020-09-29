<?php

class Model{
    protected $db;

    function __construct(){

        /**
         * conexion con base de datos
        */
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_just;charset=utf8', 'root', '');
    }
}