<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['logged_in']);
header('Location: login.php');
//session_destroy();
?>