<?php

	$page_title = "Jayrolex: Movies";
	
	require_once ('includes/header.php');
	require_once ('includes/database.php');
	
	//select statement
	$query_str = "SELECT * FROM $tblMovies";
	
	//execut the query
	$result = $conn->query($query_str);
	
	//Handle selection errors
	if (!$result) {
	    $errno = $conn->errno;
	    $errmsg = $conn->error;
	    echo "Selection failed with: ($errno) $errmsg<br/>\n";
	    $conn->close();
	    exit;
	}else { //display results in a table
	    ?>
	<div class="container wrapper">

		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Movies</li>
		</ul>

		<h1 class="text-center">Movies</h1>

		<div class="row">
			<div class="col-xs-4 col-xs-offset-8">
				<form action="" class="form-inline search-form" role="form">
					<div class="input-group">
						<label class="sr-only" for="movieSearch">Search Movies</label>
						<div class="input-group-addon"><i class="fa fa-search fa-lg"></i></div>
						<input type="text" name="movie" placeholder="Search" id="movieSearch" class="form-control"/>
					</div>
					<button type="submit" class="btn btn-primary">Go!</button>
				</form>
			</div>
		</div>


		<?php
		//insert a row into the table for each row of data
		while (($result_row = $result->fetch_assoc()) !== NULL) {
			?>
			<div class="row movie-list">
				<div class="col-xs-4">
					<a href="moviedetails.php?id=<?php echo $result_row['movie_id']  ?>">
						<img class="img-responsive" src="<?php echo $result_row['movie_img'] ?>" />
					</a>
				</div>

				<div class="col-xs-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<?php
								echo "<a href='moviedetails.php?id=" . $result_row['movie_id'] . "'>", $result_row['movie_name'], "</a>";
								?>
							</h3>
						</div>
						<div class="panel-body">
							<h4>Rating:
								<?php
								echo $result_row['movie_rating'];
								?>
							</h4>
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