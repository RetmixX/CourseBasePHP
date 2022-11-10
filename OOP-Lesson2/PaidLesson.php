<?php
require_once "Lesson.php";
class PaidLesson extends Lesson
{
    private $price;

    public function __construct($title, $text, $homework,$price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }



}