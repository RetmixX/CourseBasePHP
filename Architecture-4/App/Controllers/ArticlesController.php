<?php

namespace App\Controllers;

use App\Models\Article;
use App\Services\DB;
use App\View\View;

class ArticlesController{
    private $view;
    private $DB;

    public function __construct(){
        $this->view = new View(__DIR__ ."/../View/Templates");
        $this->DB = DB::getInstance();
    }

    public function view($idArticle){
        $article = Article::findById($idArticle);
        if (!empty($article))
            $this->view->renderHTML("articles/view.php", ["article"=>$article[0]]);

        else
            $this->view->renderHTML("errors/404.php", [], 404);
    }

    public function edit($idArticle){
        $article = Article::findById($idArticle);

        if (!empty($article)){
            $article[0]->setTitle("Test");
            $article[0]->setTextArticles("Kek");
            $article[0]->save($article[0]);

        }
        else
            $this->view->renderHTML("errors/404.php", [], 404);

    }

    public function add(){
        $article = new Article();
        $article->setTitle("Retmix");
        $article->setTextArticles("Test test test");
        $article->setAuthorId(1);
        $article->setCreatedAt(date("Y-m-d"));
        $article->save($article);
    }

    public function delete($idArticle){
        $article = Article::findById($idArticle);
        if (!empty($article)){
            $article[0]->delete($idArticle);
            var_dump($article[0]);
        }
        else
            echo "Неверный ID";
    }
}
