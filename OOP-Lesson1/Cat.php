<?php

class Cat
{
    private $name;
    private $color;
    private $weigh;

    public function __construct($name, $color, float $weigh)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weigh = $weigh;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getColor():string
    {
        return $this->color;
    }

    public function getWeigh():float
    {
        return $this->weigh;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function setWeigh(float $weigh): void
    {
        $this->weigh = $weigh;
    }

    public function sayHello(): string{
        return "Name: ".$this->getName()."<br>Color: ".$this->getColor();
    }





}