<?php
$resultOperation = require __DIR__ . '/calc.php'
?>

<html>
<head>
    <title>Калькулятор</title>
</head>
<body>
<b>Результат вычислений:</b>
<br>
<?= $resultOperation ?>
</body>
</html>
