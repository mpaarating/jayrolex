<?php

$page_title = "Jayrolex: Reviews";

require_once ('includes/header.php');
require_once ('includes/database.php');

$query_str = "SELECT r.*, m.movie_name, m.movie_id FROM reviews r JOIN movies m ON m.movie_id=r.review_movie_id";

$result = $conn->query($query_str);

if ($result) {
	?>
	<div class="container wrapper">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Reviews</li>
		</ul>

		<h1 class="text-center">Reviews</h1>

		<?php while ($row = $result->fetch_assoc()): ?>
			<div class="row movie-list">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<a href="moviedetails.php?id=<?= $row['movie_id'] ?>"><?= $row['movie_name'] ?></a>
							</h3>
						</div>
						<div class="panel-body <?php
						if ($row['review_rating'] >= 4 ){
							echo 'text-success';
						} elseif ( $row['review_rating'] < 2 ) {
							echo 'text-danger';
						}
						?>">
							<h4>
								Rating: <?= $row['review_rating'] ?>
							</h4>
							<p class="lead"><?= $row['review_content'] ?></p>
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