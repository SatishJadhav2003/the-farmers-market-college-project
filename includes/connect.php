<!-- This file is just for connecting to server -->

<?php
 $server = "sql12.freesqldatabase.com";
 $user = "sql12602989";
 $pass = "kYJmappSij";
 $db = "sql12602989";
$con = mysqli_connect($server,$user,$pass,$db);

// $con = new mysqli("localhost:3307", "root", "", "online-vegetables");

if (!$con) {
   die(mysqli_error($con));
}

?>


<!-- Host: sql12.freesqldatabase.com
Database name: sql12602989
Database user: sql12602989
Database password: kYJmappSij
Port number: 3306 -->