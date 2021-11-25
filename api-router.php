<?php
require_once 'libs/Router.php';
require_once 'api/ApiComentController.php';

define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');

$router = new Router();



$router->addRoute('comentarios/:ID', 'GET', 'ApiComentController', 'getCommentsByJugador');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentController', 'deleteComment');
$router->addRoute('comentarios' , 'POST', 'ApiComentController', 'insertComment');


$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource, $method);
