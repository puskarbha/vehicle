<?php require "header.php"; ?>

<?php 
     if(session_id() == '' || !isset($_SESSION)) {
         session_start();
     }
     if (!isset($_SESSION['admin_id'])) {
          header('location:index.php');
      }
?>

<section>
  <div class="container-fluid">
    <div class="row">
      <div class="first">
        <?php require "sidebar.php"; ?>
      </div>
      <div class="second">
        <div class="right">
          <div class="welcome">
            <h2>Welcome to the Dashboard of Car Rental!!</h2>
          </div>

          <div class="row">
            <div class="dash1">
              <div class="record1">
                <div class="row tls">
                  <div class="total">
                    <h2>Total</h2>
                  </div>
                  <div class="data">
                    <p>Vehicles</p>
                  </div>
                </div>
                 <div class="row tlss">
                   <div class="da">
                     <?php 
              require "../database.php";
                  $total = $pdo->query("SELECT count(*) as total FROM vehicle")->fetch();
                  ?>
                    <span><?php echo $total['total']; ?></span><br>
                    <a href="vehicledetails.php" class="vi">View Details</a>
                   </div>
                   <div class="graph">
                     <span><i class="fas fa-signal"></i></span>
                   </div>
                 </div>                 
              </div>
            </div>
            <div class="dash1">
              <div class="record2">
                <div class="row tls">
                  <div class="total">
                    <h2>Total</h2>
                  </div>
                  <div class="data">
                    <p>Users</p>
                  </div>
                </div>
                 <div class="row tlss">
                   <div class="da">
                     <?php 
              require "../database.php";
                  $verify = $pdo->query("SELECT count(*) as verify FROM user")->fetch();
                  ?>
                    <span><?php echo $verify['verify']; ?></span><br>
                    <a href="userdetails.php" class="vi">View Details</a>
                   </div>
                   <div class="graph">
                     <span><i class="fas fa-signal"></i></span>
                   </div>
                 </div>                 
              </div>
            </div>
            <div class="dash1">
              <div class="record3">
                <div class="row tls">
                  <div class="total">
                    <h2>Total</h2>
                  </div>
                  <div class="data">
                    <p>Booking</p>
                  </div>
                </div>
                 <div class="row tlss">
                   <div class="da">
                     <?php 
              require "../database.php";
                  $pending = $pdo->query("SELECT count(*) as pending FROM booking")->fetch();
                  ?>
                    <span><?php echo $pending['pending']; ?></span><br>
                    <a href="viewbooking.php" class="vi">View Details</a>
                   </div>
                   <div class="graph">
                     <span><i class="fas fa-signal"></i></span>
                   </div>
                 </div> 
              </div>
            </div>
            <div class="dash1">
              <div class="record4">
                <div class="row tls">
                  <div class="total">
                    <h2>Total</h2>
                  </div>
                  <div class="data">
                    <p>Categories</p>
                  </div>
                </div>
                 <div class="row tlss">
                   <div class="da">
                     <?php 
              require "../database.php";
                  $category = $pdo->query("SELECT count(*) as category FROM category")->fetch();
                  ?>
                    <span><?php echo $category['category']; ?></span><br>
                    <a href="viewcategory.php" class="vi">View Details</a>
                   </div>
                   <div class="graph">
                     <span><i class="fas fa-signal"></i></span>
                   </div>
                 </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>









<?php require "footer.php"; ?>