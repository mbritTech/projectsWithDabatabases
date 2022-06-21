<?php
/**
 * TODO clean data from the form, tratamiento de errores(usuario erróneo, no auth, 404)
 */
ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require_once('../app/Config/constants.php');
require_once('../vendor/autoload.php');

use App\Controllers\ApiController;
use App\Controllers\PalabraController;
use App\Controllers\IndexController;
use App\Core\Router;

session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = "invitado";
    $_SESSION['usuario'] = "";
}

$router = new Router();

$router->add(array(
    'name' => 'home',
    'path' => '/^\/|\/\w+$/',
    'action' => [IndexController::class, 'indexAction'],
    'auth' => ['invitado', 'administrador', 'usuario']
));

$router->add(array(
    'name' => 'edit',
    'path' => '/^\/edit\/\d+$/',
    'action' => [PalabraController::class, 'editAction'],
    'auth' => ['administrador']
));

$router->add(array(
    'name' => 'delete',
    'path' => '/^\/del\/\d+$/',
    'action' => [PalabraController::class, 'delAction'],
    'auth' => ['administrador']
));

$router->add(array(
    'name' => 'addition',
    'path' => '/^\/add$/',
    'action' => [PalabraController::class, 'addAction'],
    'auth' => ['administrador']
));

$router->add(array(
    'name' => 'logout',
    'path' => '/^\/logout$/',
    'action' => [IndexController::class, 'logoutAction'],
    'auth' => ['invitado','administrador', 'usuario']
));

$router->add(array(
    'name' => 'api',
    'path' => '/^\/api$/',
    'action' => [ApiController::class, 'apiAction'],
    'auth' => ['invitado','administrador', 'usuario']
));

$request = str_replace(VIRTUALHOST, '', $_SERVER['REQUEST_URI']);

$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];

    if (in_array($_SESSION['perfil'], $route['auth'])) {
        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo "No auth";
        // zona no autorizada
    }
} else {
    echo "No route";
    //error 404
}
