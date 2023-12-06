<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Войти в систему</title>
    <link rel="stylesheet" href="style.css" />
    <script defer src="js/validate.js"></script>
</head>
<body>
<?php
    require('database.php');
    session_start();
    // Проверить и начать сессию
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($dbconnect, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($dbconnect, $password);
        // Проверка пользователя в базе
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($dbconnect, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to dashboard
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Введено неправильное сочетание имя пользователя и пароля.</h3><br />
                  <p class='link'>Нажмите здесь, чтобы попробовать <a href='login.php'>войти в систему</a> снова.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post" id="form">
        <h1 class="login-title">Вход в систему</h1>
        <div id="error-message">Надо заполнить все обязательные поля</div>
        <input type="text" class="login-input" name="username" id="username" placeholder="Имя пользователя" autofocus required />
        <input type="password" class="login-input" name="password" id="password" placeholder="Пароль" required />
        <input type="submit" value="Войти" name="submit" class="login-button"/>
        <p class="link"><a href="reg.php">Создать аккаунт</a></p>
    </form>
<?php
    }
?>
</body>
</html>