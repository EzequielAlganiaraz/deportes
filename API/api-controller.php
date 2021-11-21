<?php
require_once "UsuarioModel.php";
require_once "api_view.php";

class ApiController {
    private $model;
    private $view;

    function __construct(){
        $this->model= new UsuarioModel;
        $this->view= new ApiView;
    }
    public function getAll() {
        $usuarios = $this->model->getAll();
        $this->view->response($usuarios);
    }
    public function remove($params = null) {
        $id = $params[':ID'];
        $user = $this->model->getUserbyID($id);
        
        if ($user) {
            $this->model->deleteUsuario($id);
            $this->view->response("Usuario=$id remove successfuly");
        } else {
            $this->view->response("Usuario =$id not found", 404);
        }
       
    }



    
}