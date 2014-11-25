<?php

$page_title = "Jayrolex: Reviews";

require_once ('includes/header.php');
require_once ('includes/database.php');

$movie_str = "select r.*, m.movie_name, m.movie_id from reviews r join movies m on m.movie_id=r.review_movie_id";

$resultset = $conn->query($movie_str);

if ($resultset) {
	?>
	<div class="container wrapper">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Reviews</li>
		</ul>

		<h1 class="text-center">Reviews</h1>

		<?php while ($row = $resultset->fetch_assoc()): ?>
			<div class="row movie-list">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<a href="moviedetailsphp?id=<?= $row['movie_id'] ?>"><?= $row['movie_name'] ?></a>
							</h3>
						</div>
						<div class="panel-body">
							<h4>
								<?= $row['review_rating'] ?>
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