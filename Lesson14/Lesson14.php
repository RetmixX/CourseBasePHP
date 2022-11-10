<?php
$inpunt = "-8 -3 -6 -2 -5 -4";
$array = explode(' ', $inpunt);

$maxSumCurrent = $array[0];
$maxSumTotal = $array[0];

for ($i = 1; $i < count($array); $i++) {
    $num = $array[$i];
    $maxSumCurrent += $num;

    if ($maxSumCurrent < $num) $maxSumCurrent = $num;

    if ($maxSumCurrent > $maxSumTotal) $maxSumTotal = $maxSumCurrent;
}

echo $maxSumTotal;