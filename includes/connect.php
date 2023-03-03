<!-- This file is just for connecting to server -->

<?php
//  $server = "localhost:3307";
//  $user = "root";
//  $pass = "";
//  $db = "online-vegetables";
// $con = mysqli_connect($server,$user,$pass,$db);

$con = new mysqli("localhost:3307", "root", "", "online-vegetables");

if (!$con) {
   die(mysqli_error($con));
}

?>