<?php

class LoginView extends View{

    function showLogin($mensaje = ""){

        $this->smarty->assign('isLogin', true);
        $this->smarty->assign('mensaje', $mensaje);
        
        /**
         * mostrar template del administrador
         */
        $this->smarty->display('./templates/administrador/login.tpl');
    }


    function showFormularioRegistro($mensaje = ""){
        $this->smarty->assign('isRegistro', true);        
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('./templates/administrador/login.tpl');
    }
}