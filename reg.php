<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Регистрация нового пользователя</title>
    <link rel="stylesheet" href="style.css" />
    <script defer src="js/validate.js"></script>
</head>
<body>
<?php
    require('database.php');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($dbconnect, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($dbconnect, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($dbconnect, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($dbconnect, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Вы успешно зарегистриовали аккаунт.</h3><br/>
                  <p class='link'>Нажмите здесь, чтобы <a href='login.php'>войти в систему</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Обязательные поля не заполнены.</h3><br/>
                  <p class='link'>Нажмите здесь, чтобы попробовать ещё раз <a href='reg.php'>зарегистрироваться как новый пользователь</a>.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post" id="form">
        <h1 class="login-title">Создать аккаунт</h1>
        <div id="error-message">Надо заполнить все обязательные поля</div>
        <input type="text" class="login-input" name="username" id="username" placeholder="Логин" required />
        <input type="email" class="login-input" name="email" id="email" placeholder="Электропочта">
        <input type="password" class="login-input" name="password" id="password" placeholder="Пароль">
        <input type="submit" name="submit" value="Создать" class="login-button">
        <p class="link"><a href="login.php">Войти в систему</a></p>
    </form>
<?php
    }
?>
</body>
</html>