<?php
session_start();

if(!isset($_SESSION['user']))
{
	header('location: login-form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("dashboard-menu.php"); ?>
<link rel="stylesheet" type="text/css" href="css/preferences-style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Preferences</title>
</head>

<body>

<div class="formPosition">
<form action="changePass.php" method="post">
      <h4>Change your password</h4>
      <p>
      <label for="oldpass">Current password</label>
      <input type="password" name="oldpass" id="oldpass" placeholder="********" required>
      </p>
      <p>
      <label for="newpass">Enter your new password</label>
      <input type="password" name="password" id="password" placeholder="********" required>
      </p>
      <button type="submit">Change password</button>
</form>

<br />
<br />

<form method="post" action="closeAcc.php">
      <h4>Close your account</h4>
     <p>
     <label for="myPassword">Enter your password</label>
     <input type="password" name="myPassword" id="myPassword" placeholder="********" required>
     </p>
     <button type="submit">Close my account</button>
</div>
</form>
     

</body>
</html>

