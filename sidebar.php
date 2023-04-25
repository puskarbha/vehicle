<?php 
  require 'database.php';

  $customer_id = $_SESSION['customer_id'];
  $userprofile = $pdo->prepare("SELECT * FROM user WHERE user_ID = '$customer_id'");
  $userprofile->execute(); 
  ?>


<div>
  <div class="center">
    <img src="image/avatar.png" alt="avatar" class="img-fluid">
    <?php foreach ($userprofile as $row) {?>
    <h2><?php echo $row['firstname'] ?></h2>
    <p><?php echo $row['email']; ?></p>
  <?php } ?>
  </div>
  <div>
    <ul class="users">
      <li class="users1"><a class="users2" href="index.php"><i class="fas fa-home"></i> Home</a></li>
      <li class="users1"><a class="users2" href="profile.php" style="position: relative;"><i class="fas fa-envelope"></i> Booking List</a>
      </li>
      <li class="users1"><a class="users2" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </div>
</div>