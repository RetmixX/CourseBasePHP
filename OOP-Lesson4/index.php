<?php
require_once "EnglishHuman.php";
require_once "RussianHuman.php";

$ru = new RussianHuman("Андрей");
$en = new EnglishHuman("Tom");

echo $ru->introduceYourself()."<br>";
echo $en->introduceYourself()."<br>";
