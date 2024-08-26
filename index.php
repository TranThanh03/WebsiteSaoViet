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
        
        require "./Views/header.php";

        require_once "./Controllers/{$controllerName}.php";
        $controllerObject = new $controllerName;
        $controllerObject -> $actionName();
        
        require "./Views/footer.php";
    }
