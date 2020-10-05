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
}