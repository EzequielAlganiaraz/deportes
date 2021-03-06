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
        $_SESSION['ROLE'] = $user->role; // roles: usuario o administrador 
    }

    public function checkLoggedIn() {
        if (empty($_SESSION['ID'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
        else {
            $user= $_SESSION['ID'];
            return $user;
        }
    }

    function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    } 
}
