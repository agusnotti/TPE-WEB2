<?php
require_once "./View/AdministradorView.php";
require_once "./Controller/LoginController.php";

class AdministradorController extends LoginController{ //extiendo de LoginController donde esta la funcion para chequear si el usuario esta logueado

    protected $adminView;

    function __construct(){
        $this->adminView = new AdministradorView();
        parent::__construct();      
    }

    /**
     * Muestra vista de administrador
     */
    function Administrador(){
        $this->checkLoggedIn();
        $this->adminView->showAdminPage();
    }

    function AdministrarProductos(){
        $this->checkLoggedIn();
        $isLogged = $this->isLogged();
        $productos = $this->productoModel->getProductos();
        $categorias = $this->categoriaModel->getCategorias();
        $this->adminView->showAdminProductos($categorias, $productos, $isLogged);
    }

    function AdministrarCategorias(){
        $this->checkLoggedIn();
        $isLogged = $this->isLogged();
        $categorias = $this->categoriaModel->getCategorias();
        $this->adminView->showAdminCategorias($categorias, $isLogged);
    }
}