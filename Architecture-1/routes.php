<?php

return [
    "~^hello/(.*)$~"=> [\App\Controllers\MainController::class, "sayHello"],
    "~^bye/(.*)$~"=> [\App\Controllers\MainController::class, "sayBye"],
    "~^$~"=> [\App\Controllers\MainController::class, "main"],
];
