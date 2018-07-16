<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/register-form.css">

<?php include "menu.php"; ?>
<title>Register</title>

<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes the site responive -->

<!-- including jquery from google's server -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!-- including reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>

<body>
<div class="formPosition">
<form action="addUsr.php" method="post">
	<p>
	<label for="firstName">Enter your first name:</label>
	<input type="text" name="first_name" id="firstName" placeholder="firstname" required>
	</p>
	<p>
	<label for="lastName">Enter your name:</label>
	<input type="text" name="last_name" id="lastName" placeholder="lastname" required>
	</p>
	<p>
	<label for="emailAddress">Enter your email address:</label>
	<input type="text" name="email" id="emailAddress" placeholder="email" required>
	</p>
	<p>
	<label for="username">Enter your username:</label>
	<input type="text" name="username" id="username" placeholder="username" required>
	</p>
	<label for="password">Enter your password:</label>
	<input type="password" name="password" id="password" placeholder="password" required>
	</p>
	<p>
	<center>
	<!-- placing reCAPTCHA -->
	<div class="g-recaptcha" data-sitekey="6LeAOR0UAAAAAF8-ZW8TBm4OegcNaBFzIbUVnpZN"></div>
	<br />
 	</center>
	</p>
	<center>
	<button type="submit"> Create account</button>
	</center>

</form>
</div>
</body>
</html>
