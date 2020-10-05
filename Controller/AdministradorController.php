<?php
require_once "./View/AdministradorView.php";
require_once "./Model/AdministradorModel.php";
require_once "./Controller/LoginController.php";

class AdministradorController extends LoginController{ //extiendo de LoginController donde esta la funcion para chequear si el usuario esta logueado

    protected $adminView;
    protected $adminModel;

    function __construct(){
        $this->adminView = new AdministradorView();
        $this->adminModel = new AdministradorModel();
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
        $isLogged = $this->isLogged();
        $productos = $this->productoModel->getProductos();
        $categorias = $this->categoriaModel->getCategorias();
        $this->adminView->showAdminProductos($categorias, $productos, $isLogged);
    }

    function AdministrarCategorias(){
        $categorias = $this->categoriaModel->getCategorias();
        $this->adminView->showAdminCategorias($categorias);
    }
    
}