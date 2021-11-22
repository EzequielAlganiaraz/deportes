<?php
require_once 'libs/Router.php';
require_once 'api/api-controller.php';

// creo el router
$router = new Router();

// tabla de ruteo
$router->addRoute('usuarios', 'GET', 'ApiController', 'getAll');


// rutea
$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource, $method);
