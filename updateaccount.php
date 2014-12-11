<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Update user details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve all fields from the previous page
$user_id = $_GET['id'];
$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];

//update statement
$query_str = "UPDATE users SET
    user_name='$user_name',
    user_full_name='$full_name',
    user_email='$user_email',
    user_password='$password'
    WHERE user_id='$user_id'";

//execute the query
$result = @$conn->query($query_str);

//Handle selection errors
if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Connection Failed with: $errno, $errmsg<br/>\n";
  exit;
}else {
  ?>
  <?php ?>
  <div class="container wrapper">
    <h2 class="text-center text-success">Your account has been updated</h2>
  </div>


<?php

    //The SQL select statement
    $query = "SELECT * FROM users WHERE user_name='$user_name' AND user_password='$password'";

    //Execute the query
    $result = @$conn->query($query);
    if($result -> num_rows){
      session_destroy();
      //It is a valid user. Need to store the user in Session Variables
      session_start();
      $_SESSION['login'] = $user_name;
      $result_row = $result->fetch_assoc();
      $_SESSION['role'] = $result_row['user_role'];
      $_SESSION['name'] = $result_row['user_full_name'];
      $_SESSION['id'] = $result_row['user_id'];
      //update the login status
      $login_status = 1;
    }

  header( "Refresh:5; url=useraccount.php", true, 303);
}
// close the connection.
$conn->close();

include ('includes/footer.php');
?>
