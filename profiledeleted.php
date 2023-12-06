<?php
include("authsession.php");
error_reporting(E_ALL);
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
<?php
   // Destroy session
   if(session_destroy()) {
               // Confirmed delete message
         echo "<div class='form'>
               <p>Профиль удалён успешно. Можете <a href='reg.php'>создать новый профиль</a>.</p>
               </div>";
   } else {
         echo "<div class='form'>
               <h3>Что-то пошло не так</h3><br/>
               <p class='link'>Попробуйте <a href='dashboard.php'>вернуться в свой кабинет</a>.</p>
               </div>";
     }
?>
</body>
</html>