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
$role = 2;


$query_str = "SELECT * FROM users WHERE user_name='$user_name' && user_password='$password'";
//define sql statement


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

if($result -> num_rows == 0) {
  //Insert statement
  $query_stry = "INSERT INTO users VALUES (NULL, '$user_name', '$full_name', '$user_email', '$password', '$role')";
  //Execute the query
  $insert_result = @$conn->query($query_stry);

  $new_result = @$conn->query($query_str);
  //It is a valid user. Need to store the user in Session Variables
  $_SESSION['login'] = $user_name;
  $result_row = $new_result->fetch_assoc();
  $_SESSION['role'] = $role;
  $_SESSION['name'] = $full_name;
  $_SESSION['id'] = $result_row['user_id'];
//update the login status
  $login_status = 3;
  header( "Refresh:3; url=useraccount.php", true, 303);
  ?>
  <div class="container wrapper">
    <h1 class="text-center text-success">You have successfully registered!</h1>
  </div>
<?php } else { ?>
  <div class="container wrapper">
    <h1 class="text-center text-danger">This username is already registered!</h1>
  </div>

<?php
  header( "Refresh:3; url=registration.php", true, 303);
}
include ('includes/footer.php');
?>