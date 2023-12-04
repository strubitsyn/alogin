<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Войти в систему</title>
    <link rel="stylesheet" href="style.css" />
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
                  <h3>Неправильное имя пользователя, либо пароль.</h3><br/>
                  <p class='link'>Нажмите здесь, чтобы попробовать <a href='login.php'>войти в систему</a> снова.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Вход в систему</h1>
        <input type="text" class="login-input" name="username" placeholder="Имя пользователя" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Пароль"/>
        <input type="submit" value="Войти" name="submit" class="login-button"/>
        <p class="link"><a href="reg.php">Создать аккаунт</a></p>
  </form>
<?php
    }
?>
</body>
</html>