<?php
if (empty($_GET)) return 'Ничего не передано!';

if (empty($_GET['operation'])) return 'Не передана операция';

if (isEmpty($_GET["x1"])|| isEmpty($_GET['x2'])) {
    return 'Не переданы аргументы';
}

if (!is_numeric($_GET["x1"] || is_numeric($_GET["x2"]))) return "Не число!";

$x1 = $_GET['x1'];
$x2 = $_GET['x2'];

$expression = $x1 . ' ' . $_GET['operation'] . ' ' . $x2 . ' = ';

switch ($_GET['operation']) {
    case '+':
        $result = $x1 + $x2;
        break;

    case '-':
        $result = $x1 - $x2;
        break;

    case '*':
        $result = $x1*$x2;
        break;

    case '/':
        if ($x1==0||$x2==0) return "На ноль делить нельзя";
        $result = $x1/$x2;
        break;

    default:
        return 'Операция не поддерживается';
}

return $expression . $result;


function isEmpty($value){
    if ($value=="" || $value == " ") return true;
    else return false;
}