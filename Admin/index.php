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

    include './Views/header.php';
    
    require "./Controllers/{$controllerName}.php";
    $controllerObject = new $controllerName;
    $controllerObject -> $actionName();

    include './Views/footer.php';
?>