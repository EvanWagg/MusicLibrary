<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Registration</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
	<main class="container">
		<h1>User Registration</h1>
		<?php
			if (!empty($_GET['errorMessage']))
				echo '<div class="alert alert-danger" id="message">Email already exists!</div>';
			else
				echo '<div class="alert alert-info" id="message">Please create your account</div>';
		?>
		<form method="post" action="save-registration.php">
			<fieldset class="form-group">
				<label for="email" class="col-sm-2">Email: *</label>
				<input name="email" id="email" type="email" placeholder="email@example.com" required />
			</fieldset>

			<fieldset class="form-group">
				<label for="userName" class="col-sm-2">Username *:</label>
				<input name="userName" id="userName" placeholder="'example123'" required />
			</fieldset>

			<fieldset class="form-group">
				<label for="userPass" class="col-sm-2">Password *:</label>
				<input name="userPass" id="userPass" type="password" placeholder="8-255 in length" required />
			</fieldset>

			<fieldset class="form-group">
				<label for="confirm" class="col-sm-2">Confirm Password *:</label>
				<input name="confirm" id="confirm" type="password" placeholder="Confirm Password" required />
			</fieldset>
			<button class="btn btn-success col-sm-offset-2">Register</button>
		</form>
	</main>
</body>
<!-- Latest jQuery -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom js -->
<script src="js/app.js"></script>
</html>
