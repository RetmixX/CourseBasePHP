<?php
return [
    "~^articles/(\d+)$~"=>[\App\Controllers\ArticlesController::class, "view"],
    '~^article/edit/(\d+)$~' => [\App\Controllers\ArticlesController::class, 'edit'],
    '~^article/delete/(\d+)$~' => [\App\Controllers\ArticlesController::class, 'delete'],
    '~^article/add$~' => [\App\Controllers\ArticlesController::class, 'add'],
    '~^users/register$~' => [\App\Controllers\UserController::class, 'signUp'],
    '~^users/login$~' => [\App\Controllers\UserController::class, 'login'],
    '~^users/logout$~' => [\App\Controllers\UserController::class, 'logOut'],
    "~^$~"=>[\App\Controllers\MainController::class, "main"],
];