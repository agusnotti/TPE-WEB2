<?php
include_once 'api/ApiComentarioController.php';
include_once 'Model/ComentarioModel.php';
include_once 'RouterClass.php';


$r = new Router();

$r->addRoute('producto/:ID', 'GET', 'ApiComentarioController', 'ObtenerComentariosById');
$r->addRoute('producto', 'POST', 'ApiComentarioController', 'AgregarComentario');
$r->addRoute('producto/comentario/:ID', 'DELETE', 'ApiComentarioController', 'BorrarComentarioById');

//run
$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);