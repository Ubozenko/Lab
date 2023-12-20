<?php
include "core/config.php";
include "core/connection.php";
include_once "core/Model.php";
include_once "models/User.php";
include_once "models/Material.php";
include_once "core/Controller.php";
include_once "controllers/UserController.php";
include_once "controllers/MaterialController.php";
include_once "core/Router.php";

// Створення екземпляра класу Router
$router = new Router();

// Додавання маршрутів до об'єкту Router
$router->addRoute('GET', '/users', [UserController::class, $pdo, 'index']);
$router->addRoute('GET', '/users/{id}', [UserController::class, $pdo, 'show']);
$router->addRoute('GET', '/materials', [MaterialController::class, $pdo, 'index']);
$router->addRoute('GET', '/materials/{id}', [MaterialController::class, $pdo, 'show']);
$router->addRoute('POST', '/materials/create', [MaterialController::class, $pdo, 'create']);

// Обробка запиту через Router
$router->handleRequest();

// Ваш попередній код обробки $action
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'user_index':
        $userController = new UserController($pdo);
        $userController->index();
        break;
    case 'user_show':
        $id = $_GET['id'] ?? null;
        $userController = new UserController($pdo);
        $userController->show($id);
        break;
    case 'material_index':
        $materialController = new MaterialController($pdo);
        $materialController->index();
        break;
    case 'material_show':
        $id = $_GET['id'] ?? null;
        $materialController = new MaterialController($pdo);
        $materialController->show($id);
        break;
    default:
        break;
}
?>
