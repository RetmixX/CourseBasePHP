<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <style>
        .layout {
            width: 100%;
            max-width: 1024px;
            margin: auto;
            background-color: white;
            border-collapse: collapse;
        }

        .layout tr td {
            padding: 20px;
            vertical-align: top;
            border: solid 1px gray;
        }

        .header {
            font-size: 30px;
        }

        .footer {
            text-align: center;
        }

        .sidebarHeader {
            font-size: 20px;
        }

        .sidebar ul {
            padding-left: 20px;
        }

        a, a:visited {
            color: darkgreen;
        }

    </style>
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?php if (!empty($user)) { ?>
                Привет, <?= $user[0]->getNickname() ?> | <a href="/users/logout">Выйти</a>
            <?php } else { ?>
                <a href="/users/login">Войдите на сайт</a> | <a href="/users/register">Зарегестрируйтесь</a>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td>
