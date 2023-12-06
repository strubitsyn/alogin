<?php
include("authsession.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Удаление профиля <?php echo $_SESSION['username']; ?></title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
      require('database.php');
      $username = $_SESSION['username'];
      $delquery = "DELETE FROM `users` WHERE username='$username';";
      $result   = mysqli_query($dbconnect, $delquery);
      if(isset($_POST['submit'])) {
         if ($result) {
            header("Location: profiledeleted.php");
        } else {
            echo "<h3>Что-то пошло не так. Ошибка</h3>";
        }
      }
?>

        <form class="form" action="" method="post" id="form">
         <p>Удаление учетной записи пользователя <?php echo $_SESSION['username']; ?>!</p>
        
         <p>Вы точно хотите удалить свой профиль?</p>
         <input type="submit" name="submit" value="Да, удалить" class="login-button">
         <p class="link">Не надо удалять мою учётную запись, я передумал, <a href="dashboard.php">вернуться в личный кабинет</a></p>
        </form>

</body>
</html>