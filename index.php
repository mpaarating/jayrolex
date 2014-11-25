<?php
	$page_title = "Jayrolex";
	include_once('includes/header.php');
?>


	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<div class="container">
			<h1>JAYROLEX Movie Service</h1>
			<p>Welcome to the JAYROLEX Movie Review Service!</p>
		</div>
	</div>

	<div class="container">
		<!-- Example row of columns -->
		<div class="row">
			<div class="col-md-4">
				<h2>CREATE ACCOUNT</h2>
				<p>Sign up for an account in order to add a review to your favorite movie</p>
				<p><a class="btn btn-default" href="register.php" role="button">SIGN UP &raquo;</a></p>
			</div>
			<div class="col-md-4">
				<h2>LIST MOVIES</h2>
				<p>Browse our extensive list of movie titles along with ratings, years, a short synopsis, and even reviews!</p>
				<p><a class="btn btn-default" href="movies.php" role="button">VIEW MOVIES &raquo;</a></p>
			</div>
			<div class="col-md-4">
				<h2>LIST REVIEWS</h2>
				<p>Browse all of our reviews and find out more about what others thought of your favorite movies!</p>
				<p><a class="btn btn-default" href="reviews.php" role="button">VIEW REVIEWS &raquo;</a></p>
			</div>
		</div>

	</div> <!-- /container -->


<?php
	include_once('includes/footer.php');