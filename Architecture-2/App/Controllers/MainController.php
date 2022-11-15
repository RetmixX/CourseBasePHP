<?php
namespace App\Controllers;


use App\Services\DB;
use App\View\View;

class MainController{
    private $view;
    private $db;

    public function __construct(){
        $this->view = new View(__DIR__ ."/../View/Templates");
        $this->db = new DB();
    }

    public function main(){
        $articles = $this->db->query("select * from articles;");
        $this->view->renderHTML("main/main.php", ["articles"=>$articles]);
    }

    public function sayHello($param){
        $this->view->renderHTML("main/hello.php", ["name"=>$param]);
    }
}