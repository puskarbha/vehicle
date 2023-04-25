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

if (isset($_POST['login'])) {
		$customer = $pdo->prepare("SELECT * FROM user WHERE email = :email");
		$criteria = [
			'email' => $_POST['email']
		];
		$fault = false;
		$customer->execute($criteria);
		if ($customer->rowCount()>0) {
			$user = $customer->fetch();
			if (password_verify($_POST['password'], $user['password'])) {
				session_start();
				$_SESSION['customer'] = $user['email'];
				$_SESSION['customer_id'] = $user['user_ID'];
				$_SESSION['customers'] = $user['firstname'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1800);
				header('location:index.php');
			}
			else
				$fault = true;
		}
		else $fault = true;

		if ($fault == true) {
			 echo "<script>alert('Email address and Password doesn\'t matched!<br>Please try again!');</script>";
		}
	}

?>


<section class="login">
	<div class="logins">
		<div class="fst">
			<h2>Car Rental</h2>
		</div>
		<div class="lgn">
			<div class="lgn1">
				<form class="forms" method="POST" action="">
					<div class="form-control">
						<div class="form1 lg"><label>Email address</label></div>
						<div class="form2"><input type="text" name="email" required></div>
					</div>
					<div class="form-control">
						<div class="form1 lg"><label>Password</label></div>
						<div class="form2"><input type="password" name="password" required></div>
					</div>
					<div class="form-control logs">
						<input type="submit" name="login" class="log" value="Log in">
					</div>
				</form>
			</div>
			<div class="lgn2">
				<div>
					<h2>Not a member</h2>
					<p>FREE to join! With Hertz Gold Plus Rewards® booking a car has never been easier, faster or more rewarding.</p>
					<ol>
						<li>It's Fast</li>
						<li>It's Flexible</li>
						<li>It's Easy</li>
					</ol>
					<div style="padding-top: 20px;">
						<a href="register.php" class="btn">Join Now for Free</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require "footer.php"; ?>