<?php
include("authsession.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Редактирование профиля <?php echo $_SESSION['username']; ?></title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Редактирование пользователя <?php echo $_SESSION['username']; ?>!</p>
        
        <p>[edit user info]</p>
        
        <p>Или Вы можете <a href="dashboard.php">Вернуться в Личный Кабинет</a>.</p>
    </div>
</body>
</html>