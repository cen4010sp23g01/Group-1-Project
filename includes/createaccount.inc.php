<?php

if (isset($_POST["submit"])) {

  // Get form data
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  // Check if inputs empty
  if (emptyInputSignup($username, $pwd, $pwdRepeat) !== false) {
    header("location: ../createaccount.php?error=emptyinput");
		exit();
  }
  // Check username is valid
  if (invalidUsername($username) !== false) {
    header("location: ../createaccount.php?error=invalidusername");
		exit();
  }
  // Check passwords match
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../createaccount.php?error=passwordsdontmatch");
		exit();
  }

  // Insert user into database
  createUser($conn, $username, $pwd);

} else {
	header("location: ../createaccount.php");
    exit();
}
