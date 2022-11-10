<?php
require_once "Cat.php";
$cat1 = new Cat("Снежок", "white", 30.4);
$cat2 = new Cat("Барсик", "orange", 30.4);
echo $cat1->sayHello()."<br>"."<br>";
echo $cat2->sayHello();