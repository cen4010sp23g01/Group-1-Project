<?php

    $servername = "localhost";
    $dbUsername = "cen4010sp23g01";
    $dbPassword = "Gsp#12386";
    $dbName = "cen4010sp23g01";
            
    // Create connection
    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }