<?php
    
    require_once 'Controller/JustController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "JustController", "Home");
    $r->addRoute("categoria", "GET", "JustController", "Categoria");
    $r->addRoute("producto", "GET", "JustController", "Producto");

    //Insertar Elemento
    $r->addRoute("insert", "POST", "JustController", "InsertProducto");

    //Ruta por defecto.
    $r->setDefaultRoute("JustController", "Home");

    

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>