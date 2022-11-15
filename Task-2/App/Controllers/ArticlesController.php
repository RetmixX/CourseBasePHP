<?php

namespace App\Controllers;

use App\Exceptions\DeniedAccess;
use App\Exceptions\InvalidArgumentException;
use App\Exceptions\UnauthException;
use App\Models\Article;

class ArticlesController extends BaseController {

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
        if ($this->user[0] === null) throw new UnauthException();

        if (!empty($_POST)){
            try {
                $article = Article::createFromArray($_POST, $this->user[0]);
            }catch (InvalidArgumentException $ex){
                $this->view->renderHTML("articles/add.php", ["error"=>$ex->getMessage()]);
                return;
            }catch (DeniedAccess $ex){
                $this->view->renderHTML("articles/add.php", ["error"=>$ex->getMessage()], 403);
                return;
            }
            header("Location: /articles/".$article->getId(), true, 302);
            exit();
        }

        $this->view->renderHTML("articles/add.php");
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
