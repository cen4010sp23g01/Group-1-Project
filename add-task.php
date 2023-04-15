<?php
    include('config/constants.php');
?>

<html>

    <head>
        <title>Create Bounty</title>
    </head>

    <body>
        <div class="menu">
            <a href="bountyboard.php">Bounty Board</a>

        </div>

        <h2>Create a New Bounty</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td>Bounty Name:</td>
                    <!--input bounty name -->
                    <td><input type="text" name="bountyName" placeholder="Type bounty name here" required="required" />
                    </td>
                </tr>

                <tr>
                    <td>Priortity:</td> <!-- select the priority/difficulty level-->

                    <td>
                        <select name="priority">
                            <option value="3">Hard</option>
                            <option value="2">Medium</option>
                            <option value="1">Easy</option>
                        </select>
                    </td>
                <tr>

                <tr>
                    <td>Deadline:</td> <!-- Select the deadline date via calendar -->
                    <td><input type="date" name="deadline"></td>
                <tr>

                <tr>
                    <td>Notes:</td> <!-- Adding notes-->
                    <td><textarea name="bountyNotes" placeholder="Type notes here"></textarea></td>
                </tr>

                <tr>
                    <!--submit to enter in db and show on bounty board-->
                    <td><input type="submit" name="submit" value="submit" /></td>
                </tr>
            </table>
        </form>
    </body>

</html>


<?php
    if(isset($_POST['submit'])){
        
        //get and save input values    
        $bountyName= $_POST['bountyName'];
        $bountyNotes= $_POST['bountyNotes'];
        $bountyDifficulty =$_POST['priority'];
        $bountyDate = $_POST['deadline'];

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        /*if($conn==true){
            echo "database connected";
        }*/
        
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        /*if($db_select==true){
           echo "database selected";
        }*/

        $sql = "INSERT INTO bounties SET
            bountyName = '$bountyName',
            bountyNotes = '$bountyNotes',
            bountyDifficulty = '$bountyDifficulty',
            bountyDate = '$bountyDate'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //echo '<a href="bountyboard.php">Bounty Board</a>';
            header("location: http://localhost/cen4010sp23g01/bountyboard.php"); //redirects to bounty board
        }
        else{
            header("location:http://localhost/cen4010sp23g01/add-list.php"); //else stays in create bounty page
        }
            
    }
?>