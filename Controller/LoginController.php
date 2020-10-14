<?php
require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";
require_once "./View/AdministradorView.php";

class LoginController extends Controller{

    protected $loginView;
    protected $loginModel;

    function __construct(){
        $this->loginView = new LoginView();
        $this->loginModel = new LoginModel();
        $this->adminView = new AdministradorView();
        parent::__construct();         
    }

    /**
     * Muestra vista de login
     */
    function Login(){
       
        if($this->isLogged()){
            header("Location: " . BASE_URL . "administrador");
        }else{
            $this->loginView->showLogin();
        }
    }

    /**
     * Verifica password ingresado por input con hash de DB
     */
    function Verificar(){
        //admin@admin.com
        //pass: 123456
        $user = $_POST['input_user'];
        $pass = $_POST['input_password'];

        if (isset($user)) {
            $userFromDB = $this->loginModel->getUser($user);

            if (isset($userFromDB) && $userFromDB) {

                if(password_verify($pass, $userFromDB->password)){
                    session_start();
                    $_SESSION['EMAIL'] = $userFromDB->email;

                    header("Location: " . BASE_URL . "administrador"); 
                    
                } else {
                    $this->loginView->showLogin('Password incorrecto');
                }
            } else {
                $this->loginView->showLogin('El usuario no existe');
            }
        }
    }

    //destruyo la sesion iniciada al hacer logout
    function Logout(){
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }

    //devuelve si esta logueado
    function isLogged(){
        //veo que estado de la session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $isLogged = false;
        if (isset($_SESSION['EMAIL'])) {
            $isLogged = true;
        }
        return $isLogged;
    }

    //verifica si esta logueado
    function checkLoggedIn(){
        session_start();

        if (!isset($_SESSION['EMAIL'])) {
            header("Location: " . LOGIN); 
            die();
        }
    }
}