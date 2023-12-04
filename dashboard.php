<?php
// authsession.php file for authorized pages
include("authsession.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard (Личный кабинет пользователя)</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Добро пожаловать, <?php echo $_SESSION['username']; ?>!</p>
        <p>Доступны следующие действия:</p>
        <p><a href="editprofile.php">Редактировать Профиль Пользователя</a>.</p>
        <p><a href="logout.php">Выйти из системы</a>.</p>
    </div>
</body>
</html>