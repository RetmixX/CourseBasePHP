<?php
namespace App\Models;

use App\Models\ActiveRecordEntity;

class Article extends ActiveRecordEntity
{
    private $title;
    private $text_articles;
    private $author_id;
    private $created_at;

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