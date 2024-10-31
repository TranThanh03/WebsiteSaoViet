<?php
    session_start();
    require '../Core/Database.php';
    require '../Controllers/BaseController.php';
    require '../Models/BaseModel.php';
    
    if(isset($_SESSION['accountAdmin'])) {
        $controllerName = ucfirst(strtolower(($_REQUEST['controller']) ?? 'home') . 'Controller');
        $actionName = $_REQUEST['action'] ?? "index";
    } else {
        $controllerName = ucfirst(strtolower('auth') . 'Controller');
        $actionName = $_REQUEST['action'] ?? "index";
    }

    require './Views/header.php';
    
    require_once "./Controllers/{$controllerName}.php";
    $controllerObject = new $controllerName;
    $controllerObject -> $actionName();
    require_once "./Views/notifi/index.php";

    require './Views/footer.php';
?>