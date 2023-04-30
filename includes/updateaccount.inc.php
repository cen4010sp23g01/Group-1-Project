<?php

if (isset($_POST["submit"])) {

  // Get form data
  $userName = $_POST["username"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
        
  $userID = $_SESSION["userid"];

  // Check if inputs empty
  if (emptyInputUpdate($userName) !== false) {
    header("location: ../updateaccount.php?error=emptyinput");
		exit();
  }
  // Check username is valid
  if (invalidUsername($userName) !== false) {
    header("location: ../updateaccount.php?error=invalidusername");
		exit();
  }

  // Update user in database
  updateUser($conn, $userID, $userName);

} else {
	header("location: ../updateaccount.php");
    exit();
}
