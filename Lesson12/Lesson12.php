<?php
//1 task
$input = "1 2 3 2 4 4 2 5";
$array = array_count_values(explode(" ", $input));

$result = array_keys($array, max($array));

echo join(" ", $result);

//2 task
$input2 = "7 0 39 0 282 2 4 0 45";
$array = explode(" ", $input2);
for ($i=0; $i<count($array); $i++)
    if ($array[$i]==0){
        unset($array[$i]);
        $array[] = 0;
    }

echo join(" ", $array);