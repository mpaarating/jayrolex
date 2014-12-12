<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Delete account";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
$user_id = $_GET['id'];

//the delete statement
$query_str = "DELETE FROM users WHERE user_id = '" . $user_id . "'";

//execut the query
$result = $conn->query($query_str);

//Handle selection errors
if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Selection failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}?>
//confirm delete
<div class="container wrapper">
  <h1 class="text-center text-danger">Your account has been deleted</h1>
</div>

<?php
@session_start();

//destroy the session data on disk
session_destroy();

//delete the session cookie
setcookie(session_name(), '', time()-3600);

//destroy the $_SESSION array
$_SESSION = array();

header( "Refresh:3; url=index.php", true, 303);
// close the connection.
$conn->close();

include ('includes/footer.php');
?>
