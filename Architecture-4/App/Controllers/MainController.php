<?php
namespace App\Controllers;


use App\Models\Article;
use App\View\View;

class MainController{
    private $view;

    public function __construct(){
        $this->view = new View(__DIR__ ."/../View/Templates");
    }

    public function main(){
        $articles = Article::findAll();
        $this->view->renderHTML("main/main.php", ["articles"=>$articles]);
    }

    public function sayHello($param){
        $this->view->renderHTML("main/hello.php", ["name"=>$param]);
    }
}