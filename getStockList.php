<?php

session_start();

if(!isset($_SESSION['user']))
{
	header('location: login-form.php');
}


include "connDB.php";

//$conn = new mysqli('localhost','root','sevenup','usersDB');

$link = mysqli_connect($serverName,$userName,$password,$dbName);

$username = $_SESSION['user']; // user's name of the current session


$result = $link->query("SELECT userStocks FROM users WHERE username = '$username'");

$data = array();
while($enr = mysqli_fetch_assoc($result)){
	$a = array($enr['userStocks']);
	array_push($data,$a);
}
echo json_encode($data);

/*
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo $row['first_name'] . '<br>';
	}
}
 */



?>

