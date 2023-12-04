<?php
    $dbconnect = mysqli_connect("localhost","root","1234567","alogin");
    // printf("Начальный набор символов: %s\n", mysqli_character_set_name($dbconnect));

    /* изменение набора символов на utf8mb4 */
    mysqli_set_charset($dbconnect, "utf8mb4");
    // printf("Теперь набор символов: %s\n", mysqli_character_set_name($dbconnect));

    /* check db connect 
    report error on fail */
    if (mysqli_connect_errno()){
        echo "Не удалось соединиться с базой MySQL: " . mysqli_connect_error();
    }
?>