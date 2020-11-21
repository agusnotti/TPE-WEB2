<?php


//NO SE ESTA USANDO
class ProductoView extends View{

    function showProducto($categorias, $producto, $categoria, $isUserLogged, $isAdmin){    
        /**
         * asigno variables para mostrar
         */
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('isUserLogged', $isUserLogged);
        $this->smarty->assign('isAdmin', $isAdmin);

        
        /**
         * mostrar template
         */
        $this->smarty->display('./templates/usuario/producto.tpl');
    }
}