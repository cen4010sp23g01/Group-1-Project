<?php
include_once 'header.php';
?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- Profile Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Profile Items-->
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                <img class="img-profile" src="./assets/mascot.png" alt="Profile Image">
                
                <?php 
                    $userID = $_SESSION["userid"];
                    $userExp = $_SESSION["userexp"];
                    $userLvl = $_SESSION["userlvl"];
                
                    require_once 'includes/dbh.inc.php';
                
                    $currExp = calcCurrent($userExp, $userLvl);
                    $nextExp = calcNext($userLvl);
                
                    $totalBounties = calcCompleted($conn, $userID, 0);
                    $easyBounties = calcCompleted($conn, $userID, 1);
                    $mediumBounties = calcCompleted($conn, $userID, 2);
                    $hardBounties = calcCompleted($conn, $userID, 3);
                ?>
                
                <h2><?php echo $_SESSION["username"];?></h2>
                <!--<div class="xp-bar">
                    <div class="xp-progress"></div>
                </div>-->
                <h3>Level <?php echo intval($userLvl);?></h3>
                <h5><?php echo intval($currExp);?>/<?php echo intval($nextExp);?> XP</h5>
                <div class="completed-bounties">
                    Completed Bounties: <?php echo $totalBounties;?><br> 
                    Easy: <?php echo $easyBounties;?><br>
                    Medium: <?php echo $mediumBounties;?><br>
                    Hard: <?php echo $hardBounties;?><br>
                </div>
                <div><a href="updateaccount.php">Edit</a></div>

                <!--<a href="completed-bounties.html">Completed Bounties</a>  Add hyperlink to bountyboard -->
            </div>
        </div>
    </div>
</section>

<?php
  include_once 'footer.php';
?>