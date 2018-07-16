<?php
session_start();
header("refresh:1;url=dashboard.php");

if(!isset($_SESSION['user']))
{
	header('location: login-form.php');
}

include "connDB.php";

$link = mysqli_connect($serverName,$userName,$password,$dbName);

$username = $_SESSION['user']; // user's name of the current session

if($link === false){
	die("ERROR: Could not connect. ".mysqli_connect_error());
}
$userStocks= mysqli_real_escape_string($link,$_REQUEST['userStocks']);

$sql = "UPDATE users SET userStocks = CONCAT(userStocks,',$userStocks\n') WHERE username='$username'";

if(mysqli_query($link,$sql)){
	echo "Stock was succesfully added to your list.";
}else{
	echo "There is a problem with the database";
}
mysqli_close($link);
?>
