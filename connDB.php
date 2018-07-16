<?php

/*
 * This file contains the credentials of my database.
 * I store them to variables so if something changes I will have to make changes only here.
*/


$serverName = "localhost";
$userName = "root";
$password = ""; // add here your password (if you have one)
$dbName = "usersDB";

$conn = new mysqli($serverName,$userName,$password,$dbName);

if($conn->connect_error){
	die("Connection failed".$conn->connect_error);
}
$conn->close();
?>

