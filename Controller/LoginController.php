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
        $this->loginView->showLogin();
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

    function isLogged(){
        $isLogged = false;
        if (isset($_SESSION['EMAIL'])) {
            $isLogged = true;
        }
        return $isLogged;
    }

    //NO ESTA FUNCIONANDO ......DONDE VA ESTA FUNCION Y DESDE DONDE LA LLAMO?
    function checkLoggedIn(){
        session_start();

        if (!isset($_SESSION['EMAIL'])) {
            header("Location: " . LOGIN); 
            die();
        }
    }
}