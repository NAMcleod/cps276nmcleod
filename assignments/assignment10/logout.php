<?php
session_start();

setcookie("PHPSESSID", "", time() - 3600, "/");

unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['password']);
unset($_SESSION['access']);

session_destroy();

header('location: index.php?=login');

?>