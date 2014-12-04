<?php
   	$page_title = "User Name";

	require_once ('includes/header.php');
	require_once ('includes/database.php');
?>
	<div class="container wrapper">
		
		<h4>Favorite Movies</h4>
		
<?php 	
   	if (isset($items)) {
    	$items_count_value = array_count_values($items);

		//display the favorites content
	    foreach($items_count_value as $id=>$qty){
	        //select statement
	        $query_str = "SELECT * FROM movies WHERE movie_id=". $id;
	        //execute the query
	        $result = $conn->query($query_str);
	        $result_row = $result->fetch_assoc();
	        
	        $id = $result_row['movie_id'];
			$img = $result_row['movie_img'];
	        $title = "<a href='moviedetails.php?id= " .$result_row['movie_id']. "'>" .$result_row['movie_name']. "</a>";
?>
       
       <div class="row movie-list">
				<div class="col-xs-4">
					<a href="moviedetails.php?id=<?php echo $result_row['movie_id']  ?>">
						<img class="img-responsive" src="<?php echo "$img"; ?>" />
					</a>
				</div>

				<div class="col-xs-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<?php
								echo "$title";
								?>
							</h3>
						</div>
					</div>
				</div>
			</div>

              
<?php      
    }
?>
		
	</div>
<?php
	} else {
    	echo "You don't have any favorite movies!";
    }
	
	include ('includes/footer.php');
?>