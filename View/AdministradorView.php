<?php
//require_once "./View/View.php";

class AdministradorView extends View{
    function showLogin(){
        //mostrar template
        $this->smarty->display('./templates/administrador/login.tpl');
    }
}