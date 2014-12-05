<?php
//start a new session
session_start();

//session variables
$_SESSION['login'] = $username;
$_SESSION['name'] = $name;
$_SESSION['role'] = 2;

$login_status = 3;

header("Location: loginform.php?ls=$login_status");
