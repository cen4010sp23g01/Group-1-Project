<?php
    include_once 'header.php';
    include 'config/constants.php';
?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- Bounty Board Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Bounty Board Items-->
        <div class="row justify-content-center">
            <div class="col-12 mb-5 text-center">
                <h1>Bounty Board</h1>


                <div class="menu">
                    <a href="add-task.php">Add Task</a>
                </div>

                <p>
                    <?php
                        if(isset($_SESSION['add'])){
                            echo $_SESSION['add'];
                            unset ($_SESSION['add']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset ($_SESSION['delete']);
                        }
                        if(isset($_SESSION['delete_fail'])){
                            echo $_SESSION['delete_fail'];
                            unset ($_SESSION['delete_fail']);
                        }

                    ?>
                </p>

                <div class="all-tasks">

                    <table>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Difficulty</th>
                            <th>Deadline</th>
                        </tr>

                        <?php
                    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                    $sql = "SELECT * FROM bounties"; //select database

                    $res = mysqli_query($conn, $sql);

                        if ($res==true){
                            $count_rows= mysqli_num_rows($res);

                            if($count_rows>0)
                                            {
                             while($row = mysqli_fetch_assoc($res)){
                                $bountyID = $row['bountyID'];
                                $bountyName = $row['bountyName'];
                                $bountyDifficulty =$row['bountyDifficulty'];
                                $bountyDate = $row['bountyDate'];
                    ?>
                        <tr>
                            <td><?php echo $bountyID; ?> </td>
                            <td><?php echo $bountyName; ?></td>
                            <td><?php echo $bountyDifficulty; ?></td>
                            <td><?php echo $bountyDate; ?></td>
                            <td>
                                <a href="update-task.php?bountyID=<?php echo $bountyID;?>">Update</a>
                                <a href="delete-task.php?bountyID=<?php echo $bountyID;?>">Delete</a>
                            </td>
                        </tr>

                        <?php       }
                            }
                        }
                    else
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
  include_once 'footer.php';
?>