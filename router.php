<?php
    require_once 'Model/Model.php';
    require_once 'View/View.php';
    require_once 'Controller/Controller.php';
    require_once 'Controller/CategoriaController.php';
    require_once 'Controller/ProductoController.php';
    require_once 'Controller/AdministradorController.php';
    require_once 'Controller/LoginController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "Controller", "Home");
    $r->addRoute("categoria/:nombreCategoria", "GET", "CategoriaController", "Categoria");
    $r->addRoute("categoria/:nombreCategoria/producto/:ID", "GET", "ProductoController", "Producto");

    //### LOGIN
    $r->addRoute("login", "GET", "LoginController", "Login");
    $r->addRoute("verificarAdmin", "POST", "LoginController", "Verificar");
    $r->addRoute("logout", "GET", "LoginController", "Logout");

    //### ADMIN
    $r->addRoute("administrador", "GET", "AdministradorController", "Administrador");
    $r->addRoute("administrador/productos", "GET", "AdministradorController", "AdministrarProductos");
    $r->addRoute("administrador/categorias", "GET", "AdministradorController", "AdministrarCategorias");
    
    //### ABM PRODUCTO
        //Insertar Elemento
    $r->addRoute("insert", "POST", "ProductoController", "InsertProducto");

        //Borrar Elemento
    $r->addRoute("delete/:ID", "GET", "ProductoController", "DeleteProducto");

        //Modificar Elemento
    $r->addRoute("update/:ID", "POST", "ProductoController", "UpdateProducto");

    //### ABM CATEGORIA
        //Insertar Elemento
    $r->addRoute("insert-categoria", "POST", "CategoriaController", "InsertCategoria");

        //Borrar Elemento
    $r->addRoute("delete-categoria/:ID", "GET", "CategoriaController", "DeleteCategoria");

        //Modificar Elemento
    $r->addRoute("update-categoria/:ID", "POST", "CategoriaController", "UpdateCategoria");
    


    //Ruta por defecto.
    $r->setDefaultRoute("Controller", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
