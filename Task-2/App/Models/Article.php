<?php
namespace App\Models;

use App\Exceptions\DeniedAccess;
use App\Models\ActiveRecordEntity;
use http\Exception\InvalidArgumentException;

class Article extends ActiveRecordEntity
{
    private $title;
    private $text_articles;
    private $author_id;
    private $created_at;

    public static function createFromArray($fields, User $author){
        if (empty($fields["name"]))
            throw new InvalidArgumentException("Не передано название статьи");

        if (empty($fields["text"]))
            throw new InvalidArgumentException("Не передан текст статьи");


        if ($author->getRole()==3)
            throw new DeniedAccess("Вы не можете добавлять новые статьи");

        $article = new Article();
        $article->setTitle($fields["name"]);
        $article->setTextArticles($fields["text"]);
        $article->setAuthorId($author->getId());
        $article->setCreatedAt(date("Y-m-d"));

        $article->save($article);
        return $article;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text_articles;
    }

    public function getAuthorId()
    {
        return User::findById($this->author_id);
    }

    public function getCreateAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $text_articles
     */
    public function setTextArticles($text_articles): void
    {
        $this->text_articles = $text_articles;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    protected static function getTableName()
    {
        return "articles";
    }
}