<?php require 'header.php'; ?>


<div class="container" style="padding:30px 0 0 0;">
<img src="image/vehicle.jpg" alt="vehicle" class="img-fluid ">
</div>

<section style="padding:50px 20px;">
	<div class="container">
		<div class="head">
			<h2>Listing</h2>
		</div>
		<div class="rows">
			<?php 
				require "database.php";
				$vid = $_GET['vid'];
			    $stmt = $pdo->prepare("SELECT * FROM vehicle WHERE type = $vid");

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


<?php require 'footer.php'; ?>
