<?php
    include "core/config.php";
    include "core/connection.php";
    include_once "core/Model.php";
    include_once "models/User.php";
    include "models/Material.php";
    include_once "core/Controller.php";
    include_once "controllers/UserController.php";
    include_once "controllers/MaterialController.php";

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