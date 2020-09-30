<?php
    require_once 'Model/Model.php';
    require_once 'View/View.php';
    require_once 'Controller/Controller.php';
    require_once 'Controller/CategoriaController.php';
    require_once 'Controller/ProductoController.php';
    require_once 'Controller/AdministradorController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("categoria/:nombreCategoria", "GET", "CategoriaController", "Categoria");
    $r->addRoute("categoria/:nombreCategoria/producto/:ID", "GET", "ProductoController", "Producto");
    $r->addRoute("login", "GET", "AdministradorController", "Login");
    
    //Insertar Elemento
    $r->addRoute("insert", "POST", "ProductotController", "InsertProducto");

    //Borrar Elemento
    $r->addRoute("categoria/delete/:ID", "GET", "ProductoController", "DeleteProducto");
    
    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>