<?php 
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require "./Core/Database.php";
    require "./Models/BaseModel.php";
    require "./Controllers/BaseController.php";

    $controllerName = ucfirst(strtolower(($_REQUEST['controller']) ?? 'home') . 'Controller'); 
    $actionName = $_REQUEST['action'] ?? "index";


    if(isset($_REQUEST['controller']) && $_REQUEST['controller'] === 'user') {
        require_once "./Controllers/{$controllerName}.php";
        $controllerObject = new $controllerName;
        $controllerObject -> $actionName();
    } else {
        if(!isset($_REQUEST['action']) || (isset($_REQUEST['action']) && $_REQUEST['action'] != "error")) {
            require "./Views/header.php";
        }
        
        require_once "./Controllers/{$controllerName}.php";
        $controllerObject = new $controllerName;
        $controllerObject -> $actionName();
        
        if(!isset($_REQUEST['action']) || (isset($_REQUEST['action']) && $_REQUEST['action'] != "error")) {
            require "./Views/footer.php";
        }
    }
