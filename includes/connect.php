<!-- This file is just for connecting to server -->

<?php
//  $server = "sql12.freesqldatabase.com";
//  $user = "sql12602989";
//  $pass = "kYJmappSij";
//  $db = "sql12602989";

//  $server = "sql107.epizy.com";
//  $user = "epiz_33724350";
//  $pass = "VAcQ5pfycjit2";
//  $db = "epiz_33724350_farmers_market";

$server = "localhost:3306";
$user = "root";
$pass = "";
$db = "the-farmers-market";


$con = mysqli_connect($server, $user, $pass, $db);

// $con = new mysqli("localhost:3306", "root", "", "the-farmers-market");

if (!$con) {
   echo "Connection UnSuccessfull";
}

?>
