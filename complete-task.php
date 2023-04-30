<?php
    include 'config/constants.php';
    include 'includes/functions.inc.php';

    //check if bounty_id exists
    
    if (isset($_GET['bountyID'])){

        $bountyID = $_GET['bountyID'];
        $userID = $_SESSION['userid'];
        
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        $sql = "SELECT * FROM bounties WHERE bountyID = $bountyID";

        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_assoc($res);
            $bountyDifficulty = $row['bountyDifficulty'];
            
            $sql = "UPDATE bounties SET
            bountyComplete = 1
            WHERE bountyID = '$bountyID';";

            $res = mysqli_query($conn, $sql);

            if($res!==true)
            {
                $_SESSION['complete_fail'] = "Failed to complete Bounty";
                header("location: bountyboard.php");
            }
        }
        else{
            $_SESSION['complete_fail'] = "Failed to complete Bounty";
            header("location: bountyboard.php");
        }
        
        $sql = "SELECT * FROM users WHERE userID = $userID";

        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_assoc($res);
            $userExperience = $row['userExperience'];
            $userExperience += (10 * $bountyDifficulty);
            $_SESSION["userexp"] = $userExperience;
            
            $userLevel = calcLevel($userExperience);
            $_SESSION["userlvl"] = $userLevel;
            
            $sql = "UPDATE users SET
            userExperience = '$userExperience',
            userLevel = '$userLevel'
            WHERE userID = '$userID';
            ";

            $res = mysqli_query($conn, $sql);

            if($res===true)
            {
                $_SESSION['complete'] = "Bounty Completed Sucessfully";
                header("location: bountyboard.php");
            }
        }
        else{
            $_SESSION['complete_fail'] = "Failed to complete Bounty";
            header("location: bountyboard.php");
        }
    }    
    else{
        header("location: bountyboard.php");
    }

