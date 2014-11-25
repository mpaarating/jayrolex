<?php

$page_title = "Jayrolex: Reviews";

require_once ('includes/header.php');
require_once ('includes/database.php');

//select statement
$query_str = "select * from reviews r join movies m where m.movie_id=r.review_movie_id";
$movie_str = "select r.*, m.movie_name from reviews r join movies m on m.movie_id=r.review_movie_id";

//execut the query
$result = $conn->query($query_str);
$movie_result = $conn->query($movie_str);

//Handle selection errors
if (!$movie_result || !$movie_str) {
	$errno = $conn->errno;
	$errmsg = $conn->error;
	echo "Selection failed with: ($errno) $errmsg<br/>\n";
	$conn->close();
	exit;
}else {
	$result_row = $result->fetch_assoc();
	$movie_result_row = $movie_result->fetch_assoc();
	?>
	<div class="container wrapper">

		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Reviews</li>
		</ul>

		<h1 class="text-center">Reviews</h1>



		<?php
		//insert a row into the table for each row of data
		while (($result_row = $result->fetch_assoc()) !== NULL && ($movie_result_row = $movie_result->fetch_assoc()) != NULL ) {
			?>
			<div class="row movie-list">

				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<?php
								echo "<a href='moviedetails.php?id=" . $result_row['review_movie_id'] . "'>", $movie_result_row['movie_name'], "</a>";
								?>
							</h3>
						</div>
						<div class="panel-body">
							<h4>Rating:
								<?php
								echo $result_row['review_rating'];
								?>
							</h4>
							<p class="lead"><?php echo $result_row['review_content'] ?></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php
	// clean up resultsets when we're done with them!
	$result->close();
}

// close the connection.
$conn->close();

include ('includes/footer.php');
?>