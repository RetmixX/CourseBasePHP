<?php
require_once "CalculateSquare.php";
class Square implements CalculateSquare
{
    private $x;

    public function __construct(float $x){
        $this->x = $x;
    }

    function calcSquare(): float{
        return $this->x ** 2;
    }

    public function __toString(): string
    {
        return "Square";
    }


}