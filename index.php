<?php
  include_once 'header.php';
?>

<!-- Home Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Home Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Home</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Home Items-->
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                Enter User ID into the textbox and press Submit to return User Name
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="uid">User ID (1-5):</label>
                    <input type="number" id="uid" name="uid" min="1" max="5"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {                
                $uid = $_POST["uid"];                

                $sql = "SELECT name FROM user WHERE id = " . $uid;
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    $uname = $row["name"];
                    }
                } else {
                    echo "0 results";
                }
                mysqli_close($conn);
            }
        ?>
                
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                <label for="uname">User Name:</label>
                <input type="text" id="uname" name="uname" value="<?php echo $uname;?>" disabled><br><br>
            </div>
        </div>
    </div>
</section>

<?php
  include_once 'footer.php';
?>
        