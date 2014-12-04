<?php
$page_title = "Jayrolex: New User";

include ('includes/header.php');

//start a new session
session_start();

//session variables
$_SESSION['login'] = $username;
$_SESSION['name'] = $name;
$_SESSION['role'] = 2;
?>
<div class="container wrapper">
	<div class="col-xs-6 col-xs-offset-2">
		<form class="form-horizontal" role="form" action="createuser.php" method="get" enctype="text/plain">
			<div class="form-group">
				<label for="newUserName" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="newUserName" placeholder="Username">
				</div>
			</div>
			<div class="form-group">
				<label for="newName" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="newName" placeholder="Name">
				</div>
			</div>
			<div class="form-group">
				<label for="newEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="newEmail" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="newPassword" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="newPassword" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Register</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
include('includes/footer.php');