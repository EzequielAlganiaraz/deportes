<?php

class UsuarioHelper {
    function __construct() {
        
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login($user) {
        $_SESSION['ID'] = $user->id_usuario;
        $_SESSION['USERNAME'] = $user->username;
    }

    public function checkLoggedIn() {
        if (empty($_SESSION['ID'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }

    function logout() {
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    } 
}
