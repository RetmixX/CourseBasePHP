<?php

/*use App\Controllers\MainController;

spl_autoload_register(function ($classname) {
    require_once __DIR__ . "/App" . $classname . "php";
});

$request = $_GET["route"] ?? "";
$pattern = '~^hello/(.*)$~';

preg_match($pattern, $request, $matches);*/

try {
    spl_autoload_register(function ($classname){
        require_once __DIR__ ."/".str_replace("\\", "/", $classname).".php";
    });

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/routes.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        echo 'Страница не найдена!';
        return;
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
}catch (\App\Exceptions\UnauthException $ex){
    $view = new \App\View\View(__DIR__ ."/App/View/Templates/errors");
    $view->renderHTML("401.php", ["error"=>$ex->getMessage()], 401);
}

