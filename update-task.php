<?php
    include_once 'header.php';
    include 'config/constants.php';

    if(isset($_POST['submit'])){
        
        //get and save input values 
        $bountyID = $_GET['bountyID'];
        $bountyName= $_POST['bountyName'];
        $bountyNotes= $_POST['bountyNotes'];
        $bountyDifficulty =$_POST['priority'];
        $bountyDate = $_POST['deadline'];
        $userID = $_SESSION['userid'];

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        /*if($conn==true){
            echo "database connected";
        }*/
        
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        /*if($db_select==true){
           echo "database selected";
        }*/

        $sql = "UPDATE bounties SET
            bountyUID = '$userID',
            bountyName = '$bountyName',
            bountyDate = '$bountyDate',
            bountyDifficulty = '$bountyDifficulty',
            bountyNotes = '$bountyNotes'
            WHERE bountyID = '$bountyID';
        ";

        $res = mysqli_query($conn, $sql);

        if($res===true)
        {
            //echo '<a href="bountyboard.php">Bounty Board</a>';
            header("location: bountyboard.php"); //redirects to bounty board
        }
        else{
            header("location: update-task.php"); //else stays in update bounty page
        }
            
    }

    if (isset($_GET['bountyID'])){
        $bountyID = $_GET['bountyID'];

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

        $sql = "SELECT * FROM bounties WHERE bountyID = $bountyID";

        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_assoc($res);
            $bountyName = $row['bountyName'];
            $bountyDifficulty = $row['bountyDifficulty'];
            $bountyDate = $row['bountyDate'];
            $bountyNotes = $row['bountyNotes'];
        }
        else{
            header("location: update-task.php"); //else stays in update bounty page
        }
    }
    
    else{
        header("location: bountyboard.php");
    }
?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- Bounty Board Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Bounty Board Items-->
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                <div class="menu">
                    <a href="bountyboard.php">Bounty Board</a>

                </div>

                <h2>Update a Bounty</h2>
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>Bounty Name:</td>
                            <!--input bounty name -->
                            <td><input type="text" name="bountyName" value="<?php echo $bountyName;?>" required="required" />
                            </td>
                        </tr>

                        <tr>
                            <td>Priortity:</td> <!-- select the priority/difficulty level-->

                            <td>
                                <select name="priority">
                                    <option <?php if ($bountyDifficulty==1) echo "selected='selected'";?>value="1">Easy</option>
                                    <option <?php if ($bountyDifficulty==2) echo "selected='selected'";?>value="2">Medium</option>
                                    <option <?php if ($bountyDifficulty==3) echo "selected='selected'";?> value="3">Hard</option>
                                </select>
                            </td>
                        <tr>

                        <tr>
                            <td>Start Date:</td> <!-- Select the deadline date via calendar -->
                            <td><input type="date" name="deadline" value="<?php echo $bountyDate;?>"></td>
                        <tr>

                        <tr>
                            <td>Notes:</td> <!-- Adding notes-->
                            <td><textarea name="bountyNotes" value="<?php echo $bountyNotes;?>"></textarea></td>
                        </tr>

                        <tr>
                            <!--submit to enter in db and show on bounty board-->
                            <td><input type="submit" name="submit" value="submit" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>