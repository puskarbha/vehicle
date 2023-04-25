<?php require "header.php"; ?>

<?php 
    if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['admin_id'])) {
         header('location:index.php');
     }
?>

<?php 
require "../database.php";
$certificate = $pdo->prepare("SELECT * 
            FROM category ");
$certificate->execute();

if (isset($_GET['det'])) {
        $det = $_GET['det'];
        $del = $pdo->prepare("DELETE FROM category WHERE category_ID = '$det'");
        $del->execute();
        header('refresh:1;url=viewcategory.php');
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
          <div class="detail">
            <div class="row">
              <div class="sort1">
                <h3>View User Details</h3>
              </div>
              <div class="sort">
              <input type="text" class="sorts" id="myInput" onkeyup="myFunction()" placeholder="Search ...." title="Type in a name">
            </div>
            </div>
            
            <table id="myTable">
                <tr class="header">
                  <th>Category</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($certificate as $row) {?>
                <tr>
                  <td><?php  echo $row['category_name']; ?></td>
                  <td><a  <?php echo 'href="viewcategory.php?det='.$row['category_ID'].'"' ?>><i class="fas fa-recycle"></i></a></td>
                </tr>
              <?php } ?>
              </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>









<?php require "footer.php"; ?>