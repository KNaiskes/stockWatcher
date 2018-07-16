<?php

include "connDB.php";

if(isset($_REQUEST['attempt']))
{
	# database crentanials
	$link = mysql_connect($serverName,$userName,$password) or die('cannot connect to db');
	mysql_select_db($dbName); # database name

	# variables that will be tested if they exist in the database
	$user = mysql_real_escape_string($_POST['user']);
	$password = mysql_real_escape_string($_POST['password']);

	# command, that will look if user and password match in the user table.
	$query = mysql_query("
		Select username
		FROM users
		WHERE username = '$user'
		AND password = '$password'
		") or die(mysql_error());

	# will have 1 if there is a match or 0 if there is not
	$total = mysql_num_rows($query);

	# if there is a match, create a session and forward user to location 
	if($total > 0)
	{
		session_start();
		$_SESSION['user'] = $user;
		header('location:dashboard.php');
	}
	else{
		echo "Invalid login credentials";
		header("refresh:1;url=login-form.php");

	}
}
?>
