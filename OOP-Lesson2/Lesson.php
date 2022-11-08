<?php

class Lesson
{
    private $title;
    private $text;
    private $homework;

    public function __construct($title, $text, $homework)
    {
        $this->title = $title;
        $this->text = $text;
        $this->homework = $homework;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }

    public function getHomework()
    {
        return $this->homework;
    }

    public function setHomework($homework): void
    {
        $this->homework = $homework;
    }






}