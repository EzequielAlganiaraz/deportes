<?php
require_once "./model/CommentModel.php";
require_once "ApiView.php";

class ApiComentController {
    private $model;
    private $view;

    function __construct(){
        $this->model= new ComentModel;
        $this->view= new ApiView;
    }
    public function getCommentsByJugador($params = null) {
        $idJugador = $params[':ID'];
        $comentarios = $this->model->getCommentsByJugador($idJugador);
        $this->view->response($comentarios);
    }

    public function deleteComment($params = null){
        $id = $params[':ID'];
        $comentario = $this->model->getCommentById($id);
        if ($comentario){
            $this->model->deleteComment($id);
            $this->view->response(200);
        }else{
            $msg = "No existe el comentario que desea eliminar";
            $this->view->response($msg,404);
        }
    }
    public function insertComment($params = []) {   
        $body = file_get_contents("php://input");   
        $comentario = json_decode($body);
        $commentId = $this->model->insertComment($comentario->descripcion, $comentario->puntaje,$comentario->idJugador);
        $newComment = $this->model->getCommentById($commentId);
        if ($newComment)
            $this->view->response($newComment, 200);
        else
            $this->view->response("Error al insertar comentario", 500);

    }    
}