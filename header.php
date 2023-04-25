<?php 

if (session_id() == '' || !isset($_SESSION)) {
	session_start();
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Car Rental</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>

    <div class="top">
        <div class="nav" id="main-nav">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <div class="nav-title">
                    Car Rental
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>

            <div class="nav-links">
                <li class="lin">
                    <a href="index.php">Home</a>
                </li>
                <li class="lin">
                    <a class="vehicle" href="#">Vehicle</a>
                    <ul class="ul">
                        <?php 
              include "database.php";
              $stmt = $pdo->prepare("SELECT * FROM category WHERE category_ID");
              $stmt->execute();
              foreach($stmt as $row){
              ?>
                        <li>
                            <a href="vehicle.php?vid=<?php echo $row['category_ID'];?>">
                                <?php echo $row['category_name'];?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="lin"><a href="about.php">About</a></li>
                <li class="lin"><a href="contact.php">Contact</a></li>


                <div class="rights" style="padding-top:15px;">
                    <?php if (!isset($_SESSION['customer_id'])) {?>
                    <a href="login.php">Login/Register</a>
                    <?php } else { ?>
                    <a href="profile.php"><i class="fas fa-user-circle fa-fw ico" style="font-size: 25px;"></i></a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size:25px;"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>