<?php
require __DIR__ . '/auth.php';

if (getLogin()==null){
    if (!empty($_POST)){
        $login = array_key_exists("login", $_POST)? $_POST["login"] : "";
        $password = array_key_exists("password", $_POST)? $_POST["password"] : "";

        if (auth($login, $password)){
            setcookie("login", $login, 0, "/");
            setcookie("password", $password, 0, "/");
            header("Location: /index.php");
        }else
            $error = "Oшибка в авторизации";
    }
}else
    header('Location: /index.php');
?>

<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
<?php if (isset($error)): ?>
<span style="color: red">
    <?=$error?>
</span>
<?php endif;?>
<form action="/login.php" method="post">
    <label for="login">Имя пользователя: </label><input type="text" name="login" id="login">
    <br>
    <label for="password">Пароль: </label><input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Войти">
</form>
</body>
</html>
