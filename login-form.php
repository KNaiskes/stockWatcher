<html>

<head>

<?php include "menu.php"; ?>
<link rel="stylesheet" type="text/css" href="css/login-form.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title> Login Form </title>
</head>

<body>


	<div class="formPosition">
	<form method="post" action="login.php?attempt">
		<!-- required is a html5 feature! -->
		<p>
		<label for="user">Enter your username:</label>
		<input type="text" name="user" id="user" placeholder="username" required>
		</p>
		<p>
		<label for="password">Enter your password:</label>
		<input type="password" name="password" id="password" placeholder="password" required>
		</p>
		<center>
		<button type="submit"> Log In</button>
		</center>
	</form>
	</div>
</body>

</html>
