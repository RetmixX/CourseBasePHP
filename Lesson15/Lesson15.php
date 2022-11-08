<?php
function showCode(){
    $file = fopen(__FILE__, 'r');

    while (!feof($file)) echo fgets($file)."<br>";

    fclose($file);
}

function showDir(){
    $dir = __DIR__ ."/";
    $files = scandir($dir);

    foreach ($files as $file)
        echo $file."<br>";
}

showDir();