<?php
    require_once 'Model/Model.php';
    require_once 'View/View.php';
    require_once 'Controller/Controller.php';
    require_once 'Controller/LoginController.php';
    require_once 'Controller/UserController.php';
    require_once 'Controller/CategoriaController.php';
    require_once 'Controller/ProductoController.php';
    require_once 'Controller/AdministradorController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

    $r = new Router();

    // rutas
    $r->addRoute("home/:pagina", "GET", "UserController", "Home");
    $r->addRoute("categoria/:nombreCategoria", "GET", "CategoriaController", "Categoria");
    $r->addRoute("categoria/:nombreCategoria/:pagina", "GET", "CategoriaController", "Categoria");
    $r->addRoute("categoria/:nombreCategoria/producto/:ID", "GET", "ProductoController", "Producto");

    //### LOGIN
    $r->addRoute("login", "GET", "LoginController", "Login");
    $r->addRoute("verificarAdmin", "POST", "LoginController", "Verificar");
    $r->addRoute("logout", "GET", "LoginController", "Logout");
    $r->addRoute("registrar", "GET", "LoginController", "Registrar");
    $r->addRoute("signIn", "POST", "LoginController", "SignIn");

    //### ADMIN
    $r->addRoute("administrador", "GET", "AdministradorController", "Administrador");
    $r->addRoute("administrador/productos", "GET", "AdministradorController", "AdministrarProductos");
    $r->addRoute("administrador/productos/:pagina", "GET", "AdministradorController", "AdministrarProductos");
    $r->addRoute("administrador/categorias", "GET", "AdministradorController", "AdministrarCategorias");
    $r->addRoute("administrador/usuarios", "GET", "AdministradorController", "AdministrarUsuarios");
    $r->addRoute("administrador/usuarios/habilitar/:ID", "GET", "AdministradorController", "HabilitarPermisos");
    $r->addRoute("administrador/usuarios/deshabilitar/:ID", "GET", "AdministradorController", "DeshabilitarPermisos");
    $r->addRoute("administrador/usuarios/delete/:ID", "GET", "AdministradorController", "DeleteUsuario");
    


    
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
    $r->setDefaultRoute("UserController", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
