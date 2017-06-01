<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body class="container">
	<h1>Login</h1>

	<?php
	if (!empty($_GET['invalid']))
		echo '<div class="alert alert-danger" id="message">Invalid login information!</div>';
	else
		echo '	<div class="alert alert-info" id="message">Please login to your account</div>';
	?>

	<form method="post" action="validate.php">
		<fieldset class="form-group">
			<label for="email" class="col-sm-2">Email:</label>
			<input name="email" id="email" type="email" placeholder="email@email.com" required>
		</fieldset>

		<fieldset class="form-group">
			<label for="password" class="col-sm-2">Password:</label>
			<input name="userPass" id="password" type="password" placeholder="password" required>
		</fieldset>

		<fieldset class="form-group col-sm-offset-1">
			<button class="btn btn-success">Login</button>
		</fieldset>
	</form>

</body>
<!-- Latest jQuery -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom js -->
<script src="js/app.js"></script>
</html>
