<?php
include_once 'header.php';

$conn = mysqli_connect("localhost","cen4010sp23g01","Gsp#12386","cen4010sp23g01");

if(!$conn){
    echo"<h3> No connection established</h3>";
}