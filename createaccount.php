<?php
  include_once 'header.php';
?>

<section class="page-section signup-form">
  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Create Account</h2>
    <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
  <div class="row justify-content-center signup-form-form">
      <div class="col-12 mb-5 text-center">
        <form action="includes/createaccount.inc.php" method="post">
            <input type="text" name="username" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Create Account</button>
        </form>
      </div>
  </div>
  <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invalidusername") {
        echo "<p>Choose a proper username!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords don't match!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>Your account has been created!</p>";
      }
    }
  ?>
</section>

<?php
  include_once 'footer.php';
?>
