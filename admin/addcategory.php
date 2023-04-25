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

    if (isset($_POST['upload'])) {

          $stmt = $pdo->prepare("INSERT INTO category(category_name)
              VALUES(:category_name)");
          $criteria = [
              'category_name' => $_POST['category_name']
            ];
            $stmt->execute($criteria);
            if ($stmt == true) {
                echo "<script>alert('Category added successfully.');</script>";
            }           
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
          <div>
            <section>
              <div class="apps">
                <div class=" app" style="background: #001489;">
                  <h2 class="lgs">Category</h2>
                  <div>
                    <form class="forms" method="POST" action="">
                      <div class="form-control form-controlss">
                        <div class="admform1"><label>Category Name</label></div>
                        <div class="admform2"><input type="text" name="category_name" required></div>
                      </div>
                      <div class="form-control logs logss appss">
                        <input type="submit" name="upload" class="log" value="Add">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>









<?php require "footer.php"; ?>