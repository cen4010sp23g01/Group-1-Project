<?php

// Check for empty input signup
function emptyInputSignup($username, $pwd, $pwdRepeat) {
	$result;
	if (empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid username
function invalidUsername($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


// Insert new user into database
function createUser($conn, $username, $pwd) {

	$sql_u = "SELECT * FROM user WHERE name='$username'";
	$res_u = mysqli_query($conn, $sql_u);

	if (mysqli_num_rows($res_u) > 0) {
  	  header("location: ../signup.php?error=usernametaken");
  	}
	else{
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	$sql = "INSERT INTO user (Name, Password) VALUES ('$username', '$hashedPwd');";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
		header("location: ../signup.php?error=none");
	}
}

// Check for empty input login
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if username is in database, if so then return data
function userIDExists($conn, $username) {
  $sql = "SELECT * FROM user WHERE name = '$username';";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){
	return mysqli_fetch_assoc($result);
  }
  else{return false;}
}

// Log user into website
function loginUser($conn, $username, $pwd) {
	$userIDExists = userIDExists($conn, $username);

	if ($userIDExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $userIDExists["Password"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $userIDExists["ID"];
		$_SESSION["username"] = $userIDExists["Name"];
		$_SESSION["userpwd"] = $userIDExists["Password"];
		$_SESSION["userexp"] = $userIDExists["Experience"];
		$_SESSION["userlvl"] = $userIDExists["Level"];
		header("location: ../index.php?error=none");
		exit();
	}
}
?>
