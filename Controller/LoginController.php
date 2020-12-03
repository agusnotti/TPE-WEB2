<?php
require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";
require_once "./View/AdministradorView.php";

class LoginController extends Controller{

    private $loginView;
    private $loginModel;

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
        if (isset($_POST['input_user']) && isset($_POST['input_password'])) {
            $user = $_POST['input_user'];
            $pass = $_POST['input_password'];
            $userFromDB = $this->loginModel->getUser($user);

            if (isset($userFromDB) && $userFromDB) {

                if(password_verify($pass, $userFromDB->password)){
                    session_start();
                    $_SESSION['EMAIL'] = $userFromDB->email;
                    $_SESSION['ID']= $userFromDB->id;
                    $_SESSION['NAME']= $userFromDB->nombre;

                    header("Location: " . BASE_URL . "administrador"); 
                    
                } else {
                    $this->loginView->showLogin('Password incorrecto');
                }
            } else {
                $this->loginView->showLogin('El usuario no existe');
            }
        }
    }

    function Registrar(){
        $this->loginView->showFormularioRegistro();
    }

    function SignIn(){
        if (isset($_POST['input_user']) && !empty($_POST['input_user']) && isset($_POST['input_password']) && !empty($_POST['input_password']) && isset($_POST['input_name']) && !empty($_POST['input_name'])) {
            $name = $_POST['input_name'];
            $user = $_POST['input_user'];
            $pass = $_POST['input_password'];
            $userFromDB = $this->loginModel->getUser($user);

            if (!isset($userFromDB) || !$userFromDB) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);

                $this->loginModel->addUser($name, $user, $pass);

                session_start();
                $userFromDB = $this->loginModel->getUser($user);
                $_SESSION['EMAIL'] = $user;
                $_SESSION['ID']= $userFromDB->id;
                $_SESSION['NAME']= $userFromDB->nombre;

                header("Location: " . BASE_URL . "home"); 
                
            } else {
                $this->loginView->showFormularioRegistro('El nombre de usuario ya existe');
            }
        } else {
            $this->loginView->showFormularioRegistro('Usuario o contraseña no ingresada');
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

    function isAdmin(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $isAdmin = false;
        if (isset($_SESSION['EMAIL'])) {
            $user = $this->loginModel->getUser($_SESSION['EMAIL']);
  
            if($user->permiso){
                $isAdmin = true;
            }
        }
        return $isAdmin;
    }

    //verifica si esta logueado
    function checkLoggedIn(){
        session_start();

        if (!isset($_SESSION['EMAIL'])) {
            header("Location: " . LOGIN); 
            die();
        } 

        if(!$this->isAdmin()){
            header("Location: " . BASE_URL . "home");
            die();
        }
    }

    //retorna el usuario actual
    function getLoggedUsername(){
        if (isset($_SESSION['EMAIL'])) {
            return $_SESSION['EMAIL'];
        } else {
            return null;
        }
    }

    function getLoggedUserId(){
        if (isset($_SESSION['ID'])) {
            return $_SESSION['ID'];
        } else {
            return null;
        }
    }

    function getLoggedUser(){
        if (isset($_SESSION['NAME'])) {
            return $_SESSION['NAME'];
        } else {
            return null;
        }
    }
}
