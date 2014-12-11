<?php
//start session
@session_start();

//number of items in the shopping cart
$count=0;

//retrieve the cart content
if ( isset ( $_SESSION['cart'] ) ){
	$cart = $_SESSION['cart'];

	if  ( $cart ) {
		$items = explode(',', $cart);
		$count = count($items);
	}
}

//check to see if a user if logged in
$login = '';
$name = '';
$role = 0;

if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
}

if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}

if (isset($_SESSION['role'])){
	$role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
	$session_id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><i class="fa fa-clock-o fa-lg"></i> JAYROLEX</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<?php
				if ($role == 1) : ?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="addtoaccount.php">Welcome, <?php echo $name; ?>!</a></li>
					<li><a href="addmovie.php">Add Movie</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			<?php
				endif;
				if ($role == 2) : ?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="addtoaccount.php">Welcome, <?php print_r($name); ?>!</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			<?php
				endif;
				if (empty($login)) : ?>

			<form class="navbar-form navbar-right" role="form" action="login.php" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-success">SIGN IN</button>
			</form>
			<?php endif; ?>
		</div><!--/.navbar-collapse -->
	</div>
</nav>