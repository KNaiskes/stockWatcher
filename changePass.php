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
$oldPassword = mysqli_real_escape_string($link,$_POST['oldpass']);
$newPassword = mysqli_real_escape_string($link,$_POST['password']);


$validUser = "SELECT * FROM users WHERE username='".$username."' AND password='".$oldPassword."'";
$validationResult = mysqli_query($link,$validUser);

// if username and password match, change password
if(mysqli_num_rows($validationResult) == 1){
	$sql = "UPDATE users SET password='$newPassword' WHERE username='$username' AND password='$oldPassword'";
	if(mysqli_query($link,$sql)){
		echo "Your password has been changed successfully";
		session_destroy();
		header("refresh:2;url=login-form.php");
	}
}
else{
	echo "Incorrect password";
	header("refresh:2;url=userPreference.php");
}

mysqli_close($link);
?>
