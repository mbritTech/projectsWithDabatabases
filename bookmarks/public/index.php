<?php 
/**
 * clean and sanitize forms
 */
ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

session_start();

require_once('../app/Config/constants.php');
require_once('../vendor/autoload.php');

use App\Controllers\IndexController;
use App\Controllers\BookmarkController;
use App\Controllers\UserController;
use App\Core\Router;

if (!isset($_SESSION['profile'])) {
    $_SESSION['profile'] = "invitado";
    $_SESSION['name'] = "usuario invitado";
    $_SESSION['userId'] = "";
}

$router = new Router();

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction'],
    'auth' => ['invitado', 'administrador', 'usuario']
));

$router->add(array(
    'name' => 'log out',
    'path' => '/^\/logout$/',
    'action' => [IndexController::class, 'LogoutAction'],
    'auth' => ['invitado', 'administrador', 'usuario']
));

$router->add(array(
    'name' => 'my bookmarks',
    'path' => '/^\/bookmarks$/',
    'action' => [BookmarkController::class, 'MyBookmarksAction'],
    'auth' => ['usuario']
));

$router->add(array(
    'name' => 'add bookmark',
    'path' => '/^\/bookmarks\/add$/',
    'action' => [BookmarkController::class, 'AddBookmarkAction'],
    'auth' => ['usuario']
));

$router->add(array(
    'name' => 'users administration',
    'path' => '/^\/usersAdmin$/',
    'action' => [UserController::class, 'AdminUsersAction'],
    'auth' => ['administrador']
));

$router->add(array(
    'name' => 'modify bookmarks',
    'path' => '/^\/edit\/\d+$/',
    'action' => [BookmarkController::class, 'EditBookmarkAction'],
    'auth' => ['usuario']
));

$router->add(array(
    'name' => 'delete bookmark',
    'path' => '/^\/del\/\d+$/',
    'action' => [BookmarkController::class, 'DelBookmarkAction'],
    'auth' => ['usuario']
));

$request = str_replace(VIRTUALHOST, '', $_SERVER['REQUEST_URI']);

$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];

    if (in_array($_SESSION['profile'], $route['auth'])) {
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
