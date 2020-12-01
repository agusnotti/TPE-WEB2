<?php
require_once "./View/AdministradorView.php";
require_once "./Controller/LoginController.php";

class AdministradorController extends Controller {

    private $adminView;
    private $loginController;
    private $loginModel;

    function __construct(){
        $this->loginModel= new LoginModel();
        $this->loginController= new LoginController();
        $this->adminView = new AdministradorView();
        parent::__construct();      
    }

    /**
     * Muestra vista de administrador
     */
    function Administrador(){
        $this->loginController->checkLoggedIn();
        $this->adminView->showAdminPage();
    }

    function AdministrarProductos($params = null){
        $this->loginController->checkLoggedIn();
        $isLogged = $this->loginController->isLogged();

        $paginaActual = (empty($params)) ? 1 : $params[':pagina'];
        $productosPorPagina = 5;
        $cantidadProductosDB = $this->productoModel->countProductos();
        $cantidadPaginas = ceil($cantidadProductosDB/$productosPorPagina);
        $productoInicial = ($paginaActual-1)*$productosPorPagina;
        $productos=$this->productoModel->getProductos($productoInicial, $productosPorPagina);

        $categorias = $this->categoriaModel->getCategorias();
        $url = 'administrador/productos/';
        $this->adminView->showAdminProductos($categorias, $productos, $isLogged, $cantidadPaginas, $paginaActual, $url);
    }

    function AdministrarCategorias(){
        $this->loginController->checkLoggedIn();
        $isLogged = $this->loginController->isLogged();
        $categorias = $this->categoriaModel->getCategorias();
        $this->adminView->showAdminCategorias($categorias, $isLogged);
    }

    function AdministrarUsuarios(){
        $this->loginController->checkLoggedIn();
        $isLogged = $this->loginController->isLogged();
        $username = $this->loginController->getLoggedUsername();
        $usuarios = $this->loginModel->getUsuarios($username);
        $this->adminView->showAdminUsuarios($usuarios, $isLogged);
    }

    function HabilitarPermisos($params = null){
        $id_user = $params[':ID'];
        $this->CambiarPermisos($id_user, true);
    }

    function DeshabilitarPermisos($params = null){
        $id_user = $params[':ID'];
        $this->CambiarPermisos($id_user, false);
    }

    function CambiarPermisos($usuario, $permiso){
        $this->loginModel->modificarPermisos($usuario, $permiso);
        header("Location: " . BASE_URL . "administrador/usuarios");
    }

    function DeleteUsuario($params = null){
        if(isset($params[':ID'])){
            $id = $params[':ID'];
            $this->loginModel->deleteUsuario($id);
            header("Location: " . BASE_URL . "administrador/usuarios");
        }
    }


}
