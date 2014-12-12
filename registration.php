<?php
$page_title = "Create new user";

include ('includes/header.php');
?>
<div class="container wrapper">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li class="active">Register</li>
	</ul>

    <h1 class="text-center">REGISTER</h1>
    <p class="lead text-center">Please register your account</p>
	<div class="col-xs-8 col-xs-offset-2">
		<form class="form-horizontal" role="form" action="register.php" method="get" enctype="text/plain">
			<div class="form-group">
				<label for="newUserName" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="form-group">
				<label for="newName" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="newName" name="name" placeholder="Name" required>
				</div>
			</div>
			<div class="form-group">
				<label for="newEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="newEmail" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<label for="newPassword" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
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
?>