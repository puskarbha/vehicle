<?php require "header.php"; ?>

<?php
	 if(session_id() == '' || !isset($_SESSION)) {
      session_start();
  }

	if(isset($_SESSION['customer_id'])){
		?>
		<script type="text/javascript">
			window.location.href="index.php";
		</script>
<?php	
}
?>
<?php 
require "database.php";

    if (isset($_POST['signup'])) {
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        if ($password != $confpassword) {
            echo "<script>alert('Password don't match. Please Try again!');</script>";
        }
        else{
            $stmt = $pdo->prepare("INSERT INTO user(firstname, lastname, email, address, phone, state, zip, birth, license, password)
                VALUES(:firstname, :lastname, :email, :address, :phone, :state, :zip, :birth, :license, :password)");
            $criteria = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],  
                'address' => $_POST['address'],  
                'phone' => $_POST['phone'],   
                'state' => $_POST['state'],   
                'zip' => $_POST['zip'],   
                'birth' => $_POST['birth'],   
                'license' => $_POST['license'],     
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            $stmt->execute($criteria);
            if ($stmt == true) {
                echo "<script>alert('You have joined succesfully');</script>";
            }           
        }
    }
 ?>

<section class="container" style="padding-bottom: 50px;">
	<div class="registerss">
		<div style="padding:10px 0;">
			<img src="image/register.png" alt="register" class="img-fluid">
		</div>
		<div class="reg">
			<h2 class="lgs">Start Earning with Hertz Gold Plus Rewards</h2>
			<p class="user">Free to join! Booking a car has never been easier, faster or more rewarding</p>
			<div style="max-width:800px; margin: 0 auto; padding: 5px 20px;">
				<form class="forms" method="POST" action="#">
					<div class="flex">
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>First Name</label></div>
							<div class="form2"><input type="text" name="firstname" placeholder="first name" required></div>
						</div>
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>Last Name</label></div>
							<div class="form2"><input type="text" name="lastname" placeholder="last name" required></div>
						</div>
					</div>
					<div class="flex">
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>Email</label></div>
							<div class="form2"><input type="email" name="email" placeholder="email address" required></div>
						</div>
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>Address</label></div>
							<div class="form2"><input type="text" name="address" placeholder="address" required></div>
						</div>
					</div>
					<div class="flex">
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>Phone</label></div>
							<div class="form2"><input type="text" name="phone" placeholder="phone number" required></div>
						</div>
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>State</label></div>
							<div class="form2"><input type="text" name="state" placeholder="state" required></div>
						</div>
					</div>
					<div class="flex">
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>Postal</label></div>
							<div class="form2"><input type="text" name="zip" placeholder="zip code" required></div>
						</div>
						<div class="form-control form-controls">
							<div class="form1 reg1"><label>Date of Birth</label></div>
							<div class="form2"><input type="date" name="birth" class="birth" required></div>
						</div>
					</div>
					<div class="form-control">
						<div class="form1"><label>License</label></div>
						<div class="form2"><input type="text" name="license" placeholder="license number" required></div>
					</div>
					<div class="form-control">
						<div class="form1"><label>Password</label></div>
						<div class="form2"><input type="password" name="password" placeholder="password" required></div>
					</div>
					<div class="form-control">
						<div class="form1"><label>Password Confirmation</label></div>
						<div class="form2"><input type="password" name="confpassword" placeholder="password confirmation" required></div>
					</div>
					<div class="form-control logs logss" style="padding-left: 0;">
						<input type="submit" name="signup" class="btns" value="Join Car Rental">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php require "footer.php"; ?>