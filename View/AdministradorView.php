<?php

class AdministradorView extends View{

    function showAdminPage(){
        
        /**
         * mostrar template del administrador
         */
        $this->smarty->display('./templates/administrador/adminPage.tpl');
    }


    function showAdminProductos($categorias, $productos, $isLogged, $cantidadPaginas, $paginaActual, $url){
        $this->smarty->assign('isAdminProducto', true);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('isLogged', $isLogged);
        $this->smarty->assign('cantidadPaginas', $cantidadPaginas);
        $this->smarty->assign('paginaActual', $paginaActual);
        $this->smarty->assign('url', $url);
        $this->smarty->display('./templates/administrador/adminProductos.tpl');
    }

    function showAdminCategorias($categorias, $isLogged){
        $this->smarty->assign('isAdminCategoria', true);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('isLogged', $isLogged);
        $this->smarty->display('./templates/administrador/adminCategorias.tpl');
    }

    function showAdminUsuarios($usuarios, $isLogged){
        $this->smarty->assign('isAdminUsusario', true);
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->assign('isLogged', $isLogged);
        $this->smarty->display('./templates/administrador/adminUsuarios.tpl');
    }
}