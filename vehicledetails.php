<?php require 'header.php'; ?>


<?php 
require "database.php";
  $vdt = $_GET['vdt'];
  $details = $pdo->query("SELECT * FROM vehicle v JOIN category c ON v.type = c.category_ID WHERE vehicle_ID = $vdt")->fetch();

if (isset($_POST['book'])) {

			if (isset($_SESSION['customer_id'])) { 
				 $member = $_SESSION['customer_id'];
			}

            $stmt = $pdo->prepare("INSERT INTO booking(pickup, dropoff, location, vehicle_ID, user_ID, status)
                VALUES(:pickup, :dropoff, :location, :vehicle_ID, :user_ID, '0')");
            $criteria = [
                'pickup' => $_POST['pickup'],
                'dropoff' => $_POST['dropoff'],
                'location' => $_POST['location'], 
                'vehicle_ID' => $_POST['vehicle_ID'], 
                'user_ID' => $member  
            ];
            $stmt->execute($criteria);
            if ($stmt == true) {
                echo "<script>alert('Thank your for booking Car Rental!!');</script>";
            }
    }
 ?>


<section style="padding:50px 20px;">
	<div class="container">
		<div class="det">
			<h2><?php echo $details['name']; ?></h2>
		</div>
		<div class="details">
			<div class="details1">
				<img <?php echo 'src="image/product/'.$details['image'].'"'; ?>  alt="car" class="img-fluid">
			</div>
			<div class="details2">
				<div style="padding: 0 20px 0 20px; ">
				<div class="ps">
					<p><strong><?php echo $details['price']; ?></strong> per day</p>
				</div>
				<div>
					<form method="POST" action="">
						<input type="hidden" name="vehicle_ID" value="<?php echo $details['vehicle_ID']; ?>">
						<div class="flex">
							<div class="form-control form-controls">
								<div class="form1 reg1"><label>Pick Up</label></div>
								<div class="form2"><input type="date" name="pickup"required></div>
							</div>
							<div class="form-control form-controls">
								<div class="form1 reg1"><label>Drop Off</label></div>
								<div class="form2"><input type="date" name="dropoff" required></div>
							</div>
						</div>
						<div class="form-control" style="padding:0 8px;">
							<div class="form1"><label>Location</label></div>
							<div class="form2"><input type="text" name="location" placeholder="location" required></div>
						</div>
						<div class="form-control logs logss" style="padding:0 8px;">
							<?php if(isset($_SESSION['customer_id'])){ ?>
						<input type="submit" name="book" class="btns book" value="Book Now">
						<?php } else { ?> 
							<input type="submit" name="signup" class="btns book" value="Book Now" disabled>
							<small class="text-muted">Please login to booking</small>
							<?php } ?>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
		<div class="description">
			<div class="ds" style="padding:10px;">
				<h4>Details</h4>
				<hr>
				<ul>
					<li><strong>Type: </strong><?php echo $details['category_name']; ?></li>
					<li><strong>Brand: </strong><?php echo $details['brand']; ?></li>
					<li><strong>Engine: </strong><?php echo $details['engine']; ?></li>
					<li><strong>Status: </strong><?php echo $details['status']; ?></li>
					<li><strong>Transmission: </strong><?php echo $details['transmission']; ?></li>
					<li><strong>Features: </strong><?php echo $details['features']; ?></li>
					<li><strong>Style: </strong><?php echo $details['style']; ?></li>
				</ul>
			</div>
			<div class="ds" style="padding:10px;">
				<h4>Description</h4>
				<hr>
				<p><?php echo $details['description']; ?></p>
			</div>
		</div>
	</div>
</section>


<?php require 'footer.php'; ?>
