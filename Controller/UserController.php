<?php

class UserController extends LoginController{

    function __construct(){
        parent::__construct();      
    }
    /**
     * Obtiene los datos necesarios para mostrar en el home las diferentes categorias 
     * y la tabla con la cantidad total de productos
     */
    function Home(){        
        $productos=$this->productoModel->getProductos();
        $categorias = $this->categoriaModel->getCategorias();
        $isUserLogged = $this->isLogged();
        $isAdmin = $this->isAdmin();
        $this->view->showHome($categorias, $productos, $isUserLogged, $isAdmin);
    }
}