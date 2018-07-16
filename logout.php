<?php

/*
 * when user sign out a message will be printed
 * after 2 seconds user will be redirected to home page - index.php
 */

session_start();
session_destroy();
echo "You successfully log out!";
header("refresh:2;url=index.php");
?>

