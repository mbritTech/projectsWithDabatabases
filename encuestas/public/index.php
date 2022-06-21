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
use App\Controllers\QuestionController;
use App\Controllers\SurveyController;
use App\Controllers\AnswerController;
use App\Core\Router;


if (!isset($_SESSION['profileEnc'])) {
    $_SESSION['profileEnc'] = "invitado";
    $_SESSION['usuario']  = "";
    $_SESSION['name']  = "usuario invitado";
}

$router = new Router();

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction'],
    'auth' => ['invitado', 'administrador', 'usuario']
));

$router->add(array(
    'name' => 'create questions',
    'path' => '/^\/createQuestion$/',
    'action' => [QuestionController::class, 'CreateQuestAction'],
    'auth' => ['administrador']
));

$router->add(array(
    'name' => 'log out session',
    'path' => '/^\/logout$/',
    'action' => [IndexController::class, 'LogoutAction'],
    'auth' => ['invitado', 'administrador', 'usuario']
));

$router->add(array(
    'name' => 'create surveys',
    'path' => '/^\/createSurvey$/',
    'action' => [SurveyController::class, 'CreateSurveyAction'],
    'auth' => ['administrador']
));

$router->add(array(
    'name' => 'select survey for answer',
    'path' => '/^\/answerSurvey$/',
    'action' => [AnswerController::class, 'AnswerSurveyAction'],
    'auth' => ['usuario']
));


$request = str_replace(VIRTUALHOST, '', $_SERVER['REQUEST_URI']);

$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];

    if (in_array($_SESSION['profileEnc'], $route['auth'])) {
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
