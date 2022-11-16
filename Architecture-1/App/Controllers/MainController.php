<?php

namespace App\Controllers;

class MainController
{

    public function main(): void
    {
        echo "Main page";
    }

    public function sayHello($param): void
    {
        echo "Hello, " . $param . "!";
    }

    public function sayBye($param): void
    {
        echo "Bye, ".$param;
    }
}
