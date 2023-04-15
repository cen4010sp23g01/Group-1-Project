<?php
    include('config/constants.php');

    //check if bounty_id exists
    
    if (isset($_GET['bountyID'])){

        $bountyID = $_GET['bountyID'];
        
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        $sql = "DELETE FROM bounties WHERE bountyID = $bountyID";

        $res = mysqli_query($conn, $sql);

        if ($res==true){
            $_SESSION['delete'] = "Bounty Deleted Sucessfully";
            header("location: bountyboard.php");
        }   

        else{
            $_SESSION['delete_fail'] = "Failed to delete Bounty";
            header("location: bountyboard.php");
        }
    }    
    else{
        header("location: bountyboard.php");
    }

