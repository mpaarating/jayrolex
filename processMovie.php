<?php
//start a new session
session_start();

$page_title = "Register New Account";

require_once 'includes/header.php';
require_once 'includes/database.php';

$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];
$role = $_GET['role'];

//define sql statement
$query_str = "INSERT INTO users VALUES (NULL, '$user_name', '$full_name', '$user_email', '$password', '$role')";

//execute the query
$result = @$conn->query($query_str);

//handle error
if(!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Insertion failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}


header("Location: movies.php");
