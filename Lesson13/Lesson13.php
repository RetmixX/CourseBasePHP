<?php
//1 task
$input = "1 2 3";
$array = explode(" ", $input);
$resultArray = [];

for ($i=0; $i<count($array); $i++){
    if ($i+1>count($array)-1) $resultArray[$i] = (int)$array[0]*(int)$array[1];

    elseif ($i+2>count($array)-1) $resultArray[$i] = (int)$array[0]*(int)$array[count($array)-1];

    else $resultArray[$i] = (int)$array[$i+1]*(int)$array[$i+2];
}

echo join(" ", $resultArray);

//2 task
$input2 = "1 6 4 3";
$array2 = explode(" ", $input2);
$resultArray = [];
foreach ($array2 as $item){
    for ($i = 1; $i<count($array2); $i++){
        if ($item<$array2[$i]) continue;

        else $resultArray[] = (int)$item-(int)$array2[$i];
    }
}

echo max($resultArray);