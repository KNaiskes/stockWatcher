<?php
session_start();
header("refresh:1;url=login-form.php");

// include database credentials
include "connDB.php";

$link = mysqli_connect($serverName,$userName,$password,$dbName);

if($link === false){
	die("ERROR: Could not connect to the database. ".mysqli_connect_error());
}
/*
$first_name = mysqli_real_escape_string($link,$_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link,$_REQUEST['last_name']);
$email = mysqli_real_escape_string($link,$_REQUEST['email']);
$username = mysqli_real_escape_string($link,$_REQUEST['username']);
$password = mysqli_real_escape_string($link,$_REQUEST['password']);
 */
$first_name = mysqli_real_escape_string($link,$_POST['first_name']);
$last_name = mysqli_real_escape_string($link,$_POST['last_name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$username = mysqli_real_escape_string($link,$_POST['username']);
$password = mysqli_real_escape_string($link,$_POST['password']);


// prevent users from registrating with the same username or email
$checkUsername = "SELECT * FROM users WHERE username='".$username."'";
$checkEmail = "SELECT * FROM users WHERE email='".$email."'";

$usernameResult = mysqli_query($link,$checkUsername);
$emailResult = mysqli_query($link,$checkEmail);

if(mysqli_num_rows($usernameResult) >= 1){
	header("refresh:2;url=register.php");
	echo "<b>There is already an account with username:'$username'";
}
else if(mysqli_num_rows($emailResult) >=1){
	header("refresh:2;url=register.php");
	echo "<b>There is already an account with email:'$email'";
}
else{
	$sql = "INSERT INTO users (first_name,last_name,email,username,password) VALUES
	('$first_name','$last_name','$email','$username','$password')";

	if(mysqli_query($link,$sql)){
		echo "Account successfully created.";
	}else{
		echo "There is an error";
	}
}

// end the connection with the db
mysqli_close($link);
?>
