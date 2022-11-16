<?php
return [
    "~^articles/(\d+)$~"=>[\App\Controllers\ArticlesController::class, "view"],
    '~^article/edit/(\d+)$~' => [\App\Controllers\ArticlesController::class, 'edit'],
    '~^article/add$~' => [\App\Controllers\ArticlesController::class, 'add'],
    "~^$~"=>[\App\Controllers\MainController::class, "main"],
];