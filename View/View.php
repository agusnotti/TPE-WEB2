<?php
require_once "./libs/smarty/Smarty.class.php";

class View{
    protected $tituloPagina;
    protected $smarty;

    function __construct(){
        $this->tituloPagina = "Just - Cosmetica Natural";

        // inicializo Smarty
        $this->smarty = new Smarty();

        $this->smarty->assign('tituloPagina', $this->tituloPagina);
        $this->smarty->assign('baseURL', BASE_URL);
    }

    function showHome($categorias, $productos){
        //asigno variables para mostrar
        $this->smarty->assign('tituloHome', "Conoce nuestro productos");
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $productos);

        //mostrar template
        $this->smarty->display('./templates/usuario/home.tpl');
    }

    function ShowHomeLocation($location){
        header("Location: " . BASE_URL . $location);
    }

    function showError(){
        return '<h1>No se puede mostrar la pagina</h1>';
    }

}