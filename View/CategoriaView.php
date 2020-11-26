<?php
require_once "./View/View.php";

class CategoriaView extends View{


    function showCategoria($productos, $categorias, $categoria, $isUserLogged, $isAdmin, $cantidadPaginas, $paginaActual, $url){
        
        /**
         * asigno variables para mostrar
         */
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('isUserLogged', $isUserLogged);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('cantidadPaginas', $cantidadPaginas);
        $this->smarty->assign('paginaActual', $paginaActual);
        $this->smarty->assign('url', $url);


        /**
         * mostrar template
         */
        $this->smarty->display('./templates/usuario/categoria.tpl');
    }
}