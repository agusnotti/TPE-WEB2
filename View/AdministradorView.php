<?php

class AdministradorView extends View{

    function showAdminPage(){
        
        /**
         * mostrar template del administrador
         */
        $this->smarty->display('./templates/administrador/adminPage.tpl');
    }


    function showAdminProductos($categorias, $productos, $isLogged){
        $this->smarty->assign('isAdminProducto', true);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('isLogged', $isLogged);
        $this->smarty->display('./templates/administrador/adminProductos.tpl');
    }

    function showAdminCategorias($categorias){
        $this->smarty->assign('isAdminCategoria', true);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('./templates/administrador/adminCategorias.tpl');
    }
}