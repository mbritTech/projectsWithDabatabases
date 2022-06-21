<?php
ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

session_start();

require_once('../app/Config/constants.php');
require_once('../vendor/autoload.php');

use App\Controllers\IndexController;
use App\Controllers\LoanController;
use App\Core\Router;


if (!isset($_SESSION['profileLib'])) {
    $_SESSION['profileLib'] = "guest";
    $_SESSION['user'] = "";
    $_SESSION['userId'] = "";
    $_SESSION['name'] = "invitado";
    $_SESSION['surname'] = "";
    $_SESSION['loanStatus'] = "";
}


$router = new Router();

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction'],
    'auth' => ['guest', 'admin', 'cliente']
));

$router->add(array(
    'name' => 'logout',
    'path' => '/^\/logout$/',
    'action' => [IndexController::class, 'logoutAction'],
    'auth' => ['guest','admin', 'cliente']
));

$router->add(array(
    'name' => 'make loan',
    'path' => '/^\/confirmLoan\/\d$/',
    'action' => [LoanController::class, 'makeLoanAction'],
    'auth' => ['admin', 'cliente']
));

$router->add(array(
    'name' => 'user loans',
    'path' => '/^\/myLoans$/',
    'action' => [LoanController::class, 'showMyLoansAction'],
    'auth' => ['admin', 'cliente']
));

$router->add(array(
    'name' => 'cancel loan',
    'path' => '/^\/myLoans\/\d$/',
    'action' => [LoanController::class, 'cancelLoanAction'],
    'auth' => ['admin', 'cliente']
));

$request = str_replace(VIRTUALHOST, '', $_SERVER['REQUEST_URI']);

$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];

    if (in_array($_SESSION['profileLib'], $route['auth'])) {
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

