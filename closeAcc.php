<?php
session_start();
header("refresh:1;url=login-form.php");

// include database credentials
include "connDB.php";

$link = mysqli_connect($serverName,$userName,$password,$dbName);

if($link === false){
	die("ERROR: Could not connect to the database. ".mysqli_connect_error());
}

$username = $_SESSION['user'];
$password= mysqli_real_escape_string($link,$_POST['myPassword']);


$validUser = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
$validationResult = mysqli_query($link,$validUser);

// if username and password match, delete account 
if(mysqli_num_rows($validationResult) == 1){
	$sql = "DELETE FROM users WHERE username='".$username."' AND password='".$password."'";
	if(mysqli_query($link,$sql)){
		echo "Your account has been deleted";
		session_destroy();
		header("refresh:2;url=index.php");
	}
}
else{
	echo "Incorrect password";
	header("refresh:2;url=userPreference.php");
}

mysqli_close($link);
?>
