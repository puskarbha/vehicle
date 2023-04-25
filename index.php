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
			<h2>Featured Listing</h2>
		</div>
		<div class="rows">
			<?php 
				require "database.php";
				$stmt=$pdo->prepare("SELECT * FROM vehicle WHERE vehicle_ID LIMIT 3");
				$stmt->execute();
				foreach ($stmt as $row) {
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
		<?php } ?>
		</div>
	</div>
</section>


<section style="padding:50px 20px; background: #001489;">
	<div class="container">
		<div class="heads">
			<h2>How it Works</h2>
		</div>
		<div class="rows">
			<div class="column">
				<div class="how">
					<span>1</span>
					<p>Simply search for a car to hire at the price and location to suit you</p>
				</div>
			</div>
			<div class="column">
				<div class="how">
					<span>2</span>
					<p>Book your ideal car for 2 – 365 days and save $$$. All rentals include insurance and roadside assistance</p>
				</div>
			</div>
			<div class="column">
				<div class="how">
					<span>3</span>
					<p>Arrange a convenient time to collect the car. Complete an inspection report and you’re on your way!</p>
				</div>
			</div>
		</div>
	</div>
</section>



<?php require 'footer.php'; ?>
