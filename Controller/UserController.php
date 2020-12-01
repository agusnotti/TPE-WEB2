<?php

class UserController extends Controller {

    private  $loginController;
    function __construct(){
        $this->loginController= new LoginController();
        parent::__construct();      
    }
    /**
     * Obtiene los datos necesarios para mostrar en el home las diferentes categorias 
     * y la tabla con la cantidad total de productos
     */
    function Home($params = null){
        $paginaActual = (empty($params)) ? 1 : $params[':pagina'];
        $productosPorPagina = 5;
        $cantidadProductosDB = $this->productoModel->countProductos();
        $cantidadPaginas = ceil($cantidadProductosDB/$productosPorPagina); //la funcion ceil redondea las paginas para arriba
        $productoInicial = ($paginaActual-1)*$productosPorPagina;
        $productos=$this->productoModel->getProductos($productoInicial, $productosPorPagina);
        $categorias = $this->categoriaModel->getCategorias();
        $isUserLogged = $this->loginController->isLogged();
        $isAdmin = $this->loginController->isAdmin();
        $url = 'home/';

        
        $this->view->showHome($categorias, $productos, $isUserLogged, $isAdmin, $cantidadPaginas, $paginaActual, $url);
    }
}
