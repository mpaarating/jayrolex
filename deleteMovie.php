<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Delete a movie";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
$movie_id = $_GET['id'];

//the delete statement
$query_str = "DELETE FROM movies WHERE movie_id = '" . $movie_id . "'";

//execut the query
$result = $conn->query($query_str);

//Handle selection errors
if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Selection failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}
?>
  //confirm delete

<div class="container wrapper">
  <div class="h1 text-danger text-center">Movie has been deleted.</div>
</div>

<?php
// close the connection.
$conn->close();
header( "Refresh:3; url=index.php", true, 303);
include ('includes/footer.php');
?>