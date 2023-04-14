<?php
  include_once 'header.php';
  include 'logic.php';
?>

<!-- Home Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Home Items-->
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                <h1>Welcome to the Adventurer's Guild!</h1> 
                <img class="img-profile" src="./assets/mascot.png" alt="Profile Image"> 
                <div class="navbar navbar-expand-lg text-uppercase text-center">
                    <?php
                        if (isset($_SESSION["userid"]))
                        {
                            echo "
                            <div class='navbar-collapse'>
                                <ul class='navbar-nav ms-auto'>
                                    <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='profile.php'>Profile</a></li>
                                </ul>
                            </div>
                            <div class='navbar-collapse'>
                                <ul class='navbar-nav ms-auto'>
                                    <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='bountyboard.php'>Bounty Board</a></li>
                                </ul>
                            </div>
                            <div class='navbar-collapse'>
                                <ul class='navbar-nav ms-auto'>
                                    <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='calendar.php'>Calendar</a></li>
                                </ul>
                            </div>
                            <div class='navbar-collapse'>
                                <ul class='navbar-nav ms-auto'>
                                    <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='logout.php'>Logout</a></li>
                                </ul>
                            </div>";
                        }
                        else {
                            echo "
                            <div class='navbar-collapse'>
                                <ul class='navbar-nav ms-auto'>
                                    <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='createaccount.php'>Create Account</a></li>
                                </ul>
                            </div>
                            <div class='navbar-collapse'>
                                <ul class='navbar-nav ms-auto'>
                                    <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='login.php'>Log In</a></li>
                                </ul>
                            </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
  include_once 'footer.php';
?>
        