<?php

include_once 'ApiView.php';
include_once 'Model/ComentarioModel.php';

class ApiComentarioController{

    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new ComentarioModel();
        $this->view = new APIView();
        $this->data = file_get_contents('php://input');
    }

    function getData(){
        return json_decode($this->data);
    }

    public function ObtenerComentariosById($params = null){
        $id = $params[':ID'];
        if(isset($params[':ID'])){
            $comentarios = $this->model->getComentariosById($id);
            
            if(!empty($comentarios)){
                $this->view->response($comentarios, 200);
            } else {
                $this->view->response("No existen comentarios para el id = $id", 404);
            }
        } else {
            $this->view->response("No estaba seteado el id", 500);
        }
    }

    public function AgregarComentario(){
        $contenido = $this->getData();
        $success = $this->model->addComentario($contenido->descripcion, $contenido->puntaje, $contenido->id_producto, $contenido->id_usuario);
        if($success > 0){
            $this->view->response($success, 200);
        } else {
            $this->view->response("El comentario no se pudo agregar", 500);
        }
    }

    public function BorrarComentarioById($params = null){
        $id = $params[':ID'];
        if(isset($params[':ID'])){
            $comentarios = $this->model->deleteComentarioById($id);
            
            if(!empty($comentarios)){
                $this->view->response($comentarios, 200);
            } else {
                $this->view->response("No existen comentarios para el id = $id", 404);
            }
        } else {
            $this->view->response("No estaba seteado el id", 500);
        }
    }



}
