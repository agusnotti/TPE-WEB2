<?php
require_once "./libs/smarty/Smarty.class.php";

class View{
    protected $tituloPagina;
    protected $smarty;

    function __construct(){
        $this->tituloPagina = "Just - Cosmetica Natural";

        // inicializo Smarty
        $this->smarty = new Smarty();

        //  asigno variables para mostrar
        $this->smarty->assign('tituloPagina', $this->tituloPagina);
        $this->smarty->assign('baseURL', BASE_URL);
    }

    // ### HOME
    function showHome($categorias, $productos, $isUserLogged){
        //asigno variables para mostrar
        $this->smarty->assign('tituloHome', "Conoce nuestro productos");
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('isUserLogged', $isUserLogged);

        //  muestro template
        $this->smarty->display('./templates/usuario/home.tpl');
    }

    function ShowLocation($location){
        header("Location: " . BASE_URL . $location);
    }

    // Muestra un mensaje en caso de no encontrar la pagina
    function showError(){
        return '<h1>No se puede mostrar la pagina</h1>';
    }

}