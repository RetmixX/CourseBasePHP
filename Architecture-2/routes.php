<?php
return [
    "~^hello/(.*)$~"=>[\App\Controllers\MainController::class, "sayHello"],
    "~^articles/(\d+)$~"=>[\App\Controllers\ArticlesController::class, "view"],
    "~^$~"=>[\App\Controllers\MainController::class, "main"],
];