<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>