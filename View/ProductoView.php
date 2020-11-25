<?php


//NO SE ESTA USANDO
class ProductoView extends View{

    function showProducto($categorias, $producto, $categoria, $isUserLogged, $isAdmin,$id,$userName){
        /**
         * asigno variables para mostrar
         */
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('isUserLogged', $isUserLogged);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('userId',$id);
        $this->smarty->assign('userName',$userName);

        
        /**
         * mostrar template
         */
        $this->smarty->display('./templates/usuario/producto.tpl');
    }
}
