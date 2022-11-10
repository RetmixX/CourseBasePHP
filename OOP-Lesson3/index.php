<?php
require_once "Circle.php";
require_once "Rectangle.php";
require_once "Square.php";

$objects = [
    new Square(5),
    new Rectangle(2, 4),
    new Circle(5)
];

foreach ($objects as $object) {
    if ($object instanceof CalculateSquare)
        echo 'Объект класса '.get_class($object).' реализует интерфейс CalculateSquare. Площадь: ' . $object->calcSquare()."<br>";

    else echo "Объект класса ".get_class($object)." не реализует интерфейс CalculateSquare.<br>";
}

