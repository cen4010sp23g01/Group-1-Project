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

// Check for empty input update
function emptyInputUpdate($username) {
	$result;
	if (empty($username)) {
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
  $sql = "INSERT INTO users (userName, userPassword) VALUES (?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../createaccount.php?error=stmtfailed");
		exit();
	}

	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../createaccount.php?error=none");
	exit();
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

// Check for correct password
function checkPassword($pwd, $pwdHashed) {
	$result;
	if ($pwd === $pwdHashed) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if username is in database, if so then return data
function userIDExists($conn, $username) {
  $sql = "SELECT * FROM users WHERE userName = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../createaccount.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

// Log user into website
function loginUser($conn, $username, $pwd) {
	$userIDExists = userIDExists($conn, $username);

	if ($userIDExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $userIDExists["userPassword"];
	$checkPwd = checkPassword($pwd, $pwdHashed); //password_verify($pwd, $pwdHashed);

	if($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $userIDExists["userID"];
		$_SESSION["username"] = $userIDExists["userName"];
		$_SESSION["userpwd"] = $userIDExists["userPassword"];
		$_SESSION["userexp"] = $userIDExists["userExperience"];
		$_SESSION["userlvl"] = $userIDExists["userLevel"];
		header("location: ../index.php?error=none");
		exit();
	}
}

// Calculate level from experience
function calcLevel($exp) {
	$lvl = 1 + pow(($exp/10),(1/2));
    return intval($lvl);
}

//Calculate experience from level
function calcExp($lvl) {
	$exp = pow(($lvl - 1), 2) * 10;
    return $exp;
}

// Calculate current experience
function calcCurrent($exp, $lvl) {
	$minExp = calcExp($lvl);
    $currExp = $exp - $minExp;
    return $currExp;
}

// Calculate experience for next level
function calcNext($lvl) {
	$currLvlExp = calcExp($lvl);
    $nextLvlExp = calcExp($lvl + 1);
    
    $lvlDiff = $nextLvlExp - $currLvlExp;
    return $lvlDiff;
}

// Calculate completed bounties
function calcCompleted($conn, $userID, $bountyDifficulty) {
	$sql = "SELECT COUNT(*) AS bountyTotal FROM bounties WHERE bountyUID = ? AND bountyComplete <> 0 AND (? = 0 OR bountyDifficulty = ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../index.php");
        exit();
	}

	mysqli_stmt_bind_param($stmt, "sss", $userID, $bountyDifficulty, $bountyDifficulty);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row['bountyTotal'];
	}
	else {
		return 0;
	}

	mysqli_stmt_close($stmt);
    
}

// Insert new user into database
function updateUser($conn, $userid, $username) {
    $sql = "UPDATE users SET userName = ? WHERE userID = ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../updateaccount.php?error=stmtfailed");
		exit();
	}
    
	mysqli_stmt_bind_param($stmt, "ss", $username, $_SESSION["userid"]);
	mysqli_stmt_execute($stmt);
    
    $_SESSION["username"] = $username;
    
	mysqli_stmt_close($stmt);
    
	header("location: ../updateaccount.php?error=none");
	exit();
}
