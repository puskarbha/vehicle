<?php require "header.php"; ?>

<?php 
require "database.php";

    if (isset($_POST['contact'])) {

          if (isset($_SESSION['customer_id'])) { 
             $member = $_SESSION['customer_id'];
          }

            $stmt = $pdo->prepare("INSERT INTO contact(name, email, subject, message, user_ID)
                VALUES(:name, :email, :subject, :message, :user_ID)");
            $criteria = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],  
                'subject' => $_POST['subject'],  
                'message' => $_POST['message'],
                'user_ID' => $member
            ];
            $stmt->execute($criteria);
            if ($stmt == true) {
                echo "<script>alert('Thank you for contacting us.');</script>";
            }           
    }
 ?>

<section id="contact">
  <div class="contact-box">
    <div class="contact-links">
      <h2>CONTACT</h2>
      <div class="links">
        <div class="link">
          <a><img src="https://i.postimg.cc/m2mg2Hjm/linkedin.png" alt="linkedin"></a>
        </div>
        <div class="link">
          <a><img src="https://i.postimg.cc/YCV2QBJg/github.png" alt="github"></a>
        </div>
        <div class="link">
          <a><img src="https://i.postimg.cc/W4Znvrry/codepen.png" alt="codepen"></a>
        </div>
        <div class="link">
          <a><img src="https://i.postimg.cc/NjLfyjPB/email.png" alt="email"></a>
        </div>
      </div>
    </div>
    <div class="contact-form-wrapper">
      <form method="POST">
        <input type="hidden" name="user_ID" value="<?php echo $_SESSION['customer_id']; ?>">
        <div class="form-item">
          <input type="text" name="name" required>
          <label>Name:</label>
        </div>
        <div class="form-item">
          <input type="text" name="email" required>
          <label>Email:</label>
        </div>
        <div class="form-item">
          <input type="text" name="subject" required>
          <label>Subject:</label>
        </div>
        <div class="form-item">
          <textarea class="" name="message" required></textarea>
          <label>Message:</label>
        </div>
        <button type="submit" name="contact" class="submit-btn">Send</button>  
      </form>
    </div>
  </div>
</section>


<?php require "footer.php"; ?>