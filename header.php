<?php
  session_start();
  include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Task Hunter</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Task Hunter</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Home</a></li>
                    </ul>
                </div>
                <?php
                    if (isset($_SESSION["userid"]))
                    {
                        echo "
                        <div class='collapse navbar-collapse' id='navbarResponsive'>
                            <ul class='navbar-nav ms-auto'>
                                <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='profile.php'>Profile</a></li>
                            </ul>
                        </div>
                        <div class='collapse navbar-collapse' id='navbarResponsive'>
                            <ul class='navbar-nav ms-auto'>
                                <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='bountyboard.php'>Bounty Board</a></li>
                            </ul>
                        </div>
                        <div class='collapse navbar-collapse' id='navbarResponsive'>
                            <ul class='navbar-nav ms-auto'>
                                <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='calendar.php'>Calendar</a></li>
                            </ul>
                        </div>
                        <div class='collapse navbar-collapse' id='navbarResponsive'>
                            <ul class='navbar-nav ms-auto'>
                                <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='logout.php'>Logout</a></li>
                            </ul>
                        </div>";
                    }
                    else {
                        echo "
                        <div class='collapse navbar-collapse' id='navbarResponsive'>
                            <ul class='navbar-nav ms-auto'>
                                <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='createaccount.php'>Create Account</a></li>
                            </ul>
                        </div>
                        <div class='collapse navbar-collapse' id='navbarResponsive'>
                            <ul class='navbar-nav ms-auto'>
                                <li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='login.php'>Log In</a></li>
                            </ul>
                        </div>";
                    }
                ?>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="https://lamp.cse.fau.edu/~cen4010-sp23-g01/about/about.php">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
        </header>
        <div class="wrapper">