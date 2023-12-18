<?php

require_once 'router.php';
require_once 'controllers/UserController.php';

$router = new Router();
$userController = new UserController();

$router->addRoute('GET', '/users', [$userController, 'getAllUsers']);
$router->addRoute('GET', '/users/{id}', [$userController, 'getUserById']);
$router->addRoute('POST', '/users', [$userController, 'createUser']);

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route = $router->route($method, $path);

if ($route !== null) {
    list($controller, $params) = $route;
    $response = call_user_func_array($controller, $params);
    echo $response;
} else {
    http_response_code(404);
    echo "404 Not Found";
}

?>
