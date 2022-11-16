<?php

namespace App\Controllers;

use App\Services\DB;
use App\View\View;

class ArticlesController{
    private $view;
    private $DB;

    public function __construct(){
        $this->view = new View(__DIR__ ."/../View/Templates");
        $this->DB = new DB();
    }

    public function view($idArticle){
        $article = $this->DB->query("select*from articles where id=:id;", [":id"=>$idArticle]);

        if (!empty($article)){
            $author = $this->DB->query("select * from users where id = :idAuthor", [":idAuthor"=>$article[0]["author_id"]]);
            $this->view->renderHTML("articles/view.php", ["article"=>$article[0], "author"=>$author[0]]);
        }

        else
            $this->view->renderHTML("errors/404.php", [], 404);
    }
}
