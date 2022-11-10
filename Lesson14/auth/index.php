<?php

require __DIR__ . '/auth.php';
$login = getLogin();
?>


<html>
<head>
    <title>Главная страница</title>
</head>
<body>
<?php if ($login === null): ?>
    <a href="/login.php">Авторизуйтесь</a>
<?php else: ?>
    Добро пожаловать, <?= $login ?>
    <br>
    <a href="/logout.php">Выйти</a>
<?php endif; ?>
</body>
</html>



