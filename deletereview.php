<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Delete Review";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
$review_id = $_GET['id'];

//the delete statement
$query_str = "DELETE FROM reviews WHERE review_id = '" . $review_id . "'";

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
  <h1 class="text-center text-danger">Your review has been deleted</h1>
</div>

<?php
header( "Refresh:3; url=useraccount.php", true, 303);
// close the connection.
$conn->close();

include ('includes/footer.php');
?>
