<?php
    include('config/constants.php');

    if(isset($_GET['bountyID'])){
        $bountyID = $_GET['bountyID'];

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

        $sql = "SELECT * FROM bounties WHERE bountyID = $bountyID";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $row = mysqli_fetch_assoc($res);
            $bountyID = $row['bountyID'];
            $bountyName = $row['bountyName'];
            $bountyDifficulty =$row['bountyDifficulty'];
            $bountyDate = $row['bountyDate'];
            $bountyNotes = $row['bountyNotes'];
        }
        else{
            header("location:http://localhost/cen4010sp23g01/add-list.php"); //else stays in create bounty page
        }
    }
    
    else{
        header("location:http://localhost/cen4010sp23g01/bountyboard.php");
    }
?>

<html>

    <head>
        <title>Update Bounty</title>
    </head>

    <body>
        <div class="menu">
            <a href="bountyboard.php">Bounty Board</a>

        </div>

        <h2>Update a Bounty</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td>Bounty Name:</td>
                    <!--input bounty name -->
                    <td><input type="text" name="bountyName" value="<?phpecho $bountyName?>" required="required" />
                    </td>
                </tr>

                <tr>
                    <td>Priortity:</td> <!-- select the priority/difficulty level-->

                    <td>
                        <select name="priority">
                            <option <?php if ($priority=="Hard") echo "selected='selected'"?> value="3">Hard</option>
                            <option <?php if ($priority=="Medium") echo "selected='selected'"?>value="2">Medium
                            </option>
                            <option <?php if ($priority=="Easy") echo "selected='selected'"?>value="1">Easy</option>
                        </select>
                    </td>
                <tr>

                <tr>
                    <td>Deadline:</td> <!-- Select the deadline date via calendar -->
                    <td><input type="date" name="deadline" value="<?phpecho $bountyDate?>"></td>
                <tr>

                <tr>
                    <td>Notes:</td> <!-- Adding notes-->
                    <td><textarea name="bountyNotes" value="<?phpecho $bountyNotes?>"></textarea></td>
                </tr>

                <tr>
                    <!--submit to enter in db and show on bounty board-->
                    <td><input type="submit" name="submit" value="submit" /></td>
                </tr>
            </table>
        </form>
    </body>

</html>