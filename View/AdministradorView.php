<?php

class AdministradorView extends View{
    function showLogin(){
        
        /**
         * mostrar template del administrador
         */
        $this->smarty->display('./templates/administrador/login.tpl');
    }
}