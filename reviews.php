<?php

$page_title = "Jayrolex: Reviews";

require_once ('includes/header.php');
require_once ('includes/database.php');

//$query_str = "SELECT m.movie_name, m.movie_id FROM movies m JOIN  reviews r ON m.movie_id=r.review_movie_id";
$query_str = "SELECT * FROM $tblMovies";


$result = $conn->query($query_str);


if ($result) {
	?>
	<div class="container wrapper">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Reviews</li>
		</ul>

		<h1 class="text-center">Reviews</h1>

		<?php while ($movie_row = $result->fetch_assoc()): ?>

			<div class="row movie-list">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<a href="moviedetails.php?id=<?= $movie_row['movie_id'] ?>"><?= $movie_row['movie_name'] ?></a>
							</h3>
						</div>
						<div class="panel-body">
							<?php
							$review_str = "SELECT review_rating, review_content FROM reviews WHERE reviews.review_movie_id=" . $movie_row['movie_id'] . "";
							$review_result = $conn->query($review_str);
							while ($review_row = $review_result->fetch_assoc()) : ?>

							<h4>Rating: <span class="<?php
								if ($review_row['review_rating'] >= 4 ){
									echo 'text-success';
								} elseif ( $review_row['review_rating'] < 2 ) {
									echo 'text-danger';
								}
								?>"> <?=$review_row['review_rating'] ?></span></h4>
							<p class="lead"><?= $review_row['review_content'] ?></p>

						<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
<?php
} else {
	?>
	<div class="container wrapper">
		<p>Selection failed with (<?= $conn->errno ?>) <?= $conn-error ?></p>
	</div>
<?php
}

$conn->close();

include ('includes/footer.php');
?>