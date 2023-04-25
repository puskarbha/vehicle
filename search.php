<?php require 'header.php'; ?>


<div class="body">
	<div class="search">
		<div class="search1">
			<h2>Rent a better car for less money</h2>
			<p>Better prices, a wider range of cars and more locations</p>
			<div>
				<form method="POST" action="search.php"> 
					<input type="text" id="myInput" name="search" placeholder="Search cars...." title="Type in a name">
					<button class="btn" name="submit-search" type="submit" hidden>Search</button>
				</form>
			</div>
		</div>
	</div>
</div>

<section style="padding:50px 20px;">
	<div class="container">
		<div class="head">
			<h2>Searched Vehicle</h2>
		</div>
		<div class="rows">
			<?php 
				// connection with server
			   $connect = mysqli_connect('127.0.0.1','root','','vehicles');
			      if (isset($_POST['submit-search'])) {
			      	// preventing mysql injection attack
			      	$search = mysqli_real_escape_string($connect, $_POST['search']);
			      	// perform query
			      	$sql = "SELECT * FROM vehicle WHERE (name LIKE '%$search%' OR price LIKE '%$search%' OR brand LIKE '%$search' OR engine LIKE '%$search' OR status LIKE '%$search')";
			      	$result = mysqli_query($connect, $sql);
			      	$queryResult = mysqli_num_rows($result);


			         if ($queryResult > 0) {
			            while ($row = mysqli_fetch_assoc($result)) {
			            	?>
			<div class="column">
				<div style="position:relative; border: 1px solid #e8e8e8; height: 100%;">
					<a class="car" <?php echo 'href="vehicledetails.php?vdt='.$row['vehicle_ID'].'"' ?> >
						<img <?php echo 'src="image/product/'.$row['image'].'"'; ?>  alt="car" class="img-fluid">
						<div class="price">
							<p>From <big>$<?php echo $row['price']; ?></big> per day</p>
						</div>
						<div class="name">
							<p><?php echo $row['name']; ?></p>
							<p><?php echo $row['brand']; ?></p>
						</div>
					</a>
				</div>
			</div>
		<?php }	
			      } else {
			         echo "There is no such item";
			      }
			      }?>	
		</div>
	</div>
</section>




<?php require 'footer.php'; ?>
