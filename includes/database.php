<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "phpuser";
	$password = "phpuser";
	$database = "jayrolex";
	$tblMovies = "movies";
	$tblUsers = "users";
	$tblReviews = "reviews";
  
	//Connect to the mysql server
	$conn = @new mysqli($host, $login, $password, $database, $port);

	//Handle connection errors 
	if (mysqli_connect_errno() != 0) {
	    $errno = mysqli_connect_errno();
	    $errmsg = mysqli_connect_error();
	    die("Connect Failed with: ($errno) $errmsg<br/>\n");
	}
?>