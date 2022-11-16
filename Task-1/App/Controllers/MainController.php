<?php
namespace App\Controllers;


use App\Models\Article;
use App\Models\UserAuthService;

class MainController extends BaseController {

    public function main(){
        $articles = Article::findAll();
        $this->view->renderHTML("main/main.php", ["articles"=>$articles,
            "user"=>UserAuthService::getUserByToken()]);
    }

    public function sayHello($param){
        $this->view->renderHTML("main/hello.php", ["name"=>$param]);
    }
}