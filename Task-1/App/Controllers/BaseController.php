<?php

namespace App\Controllers;

use App\Models\UserAuthService;
use App\View\View;
use App\Models\User;

abstract class BaseController{
    protected $view;
    protected $user;

    public function __construct(){
        $this->user = UserAuthService::getUserByToken();
        $this->view = new View(__DIR__ ."/../View/Templates");
        $this->view->setVar("user", $this->user);
    }
}
