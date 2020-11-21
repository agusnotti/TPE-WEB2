<?php
require_once "./View/View.php";

class CategoriaView extends View{


    function showCategoria($productos, $categorias, $categoria, $isUserLogged, $isAdmin){
        
        /**
         * asigno variables para mostrar
         */
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('isUserLogged', $isUserLogged);
        $this->smarty->assign('isAdmin', $isAdmin);

        /**
         * mostrar template
         */
        $this->smarty->display('./templates/usuario/categoria.tpl');
    }
}