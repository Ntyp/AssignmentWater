<?php


$servername = "ap-southeast.connect.psdb.cloud";
$username = "ke8drz8cnyghljmj574c";
$password = "pscale_pw_zrc5qkBzotZ1Mf0VnBYiFFAWfxzfaijecMa1DUIULPp";
$dbname = "ewoc";


// start connection
$conn = mysqli_init();

// set credentials over SSL
$conn->real_connect($servername, $username, $password, $dbname, '3306', NULL, MYSQLI_CLIENT_SSL);
