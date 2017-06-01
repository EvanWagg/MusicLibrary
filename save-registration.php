<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registering User...</title>
</head>
<body>
<?php
	$email = $_POST['email'];
	$userName = $_POST['userName'];
	$userPass = $_POST['userPass'];
	$confirm = $_POST['confirm'];
	$ok = true;



	//Check if the passwords match
	if ($userPass != $confirm) {
		echo 'The passwords do not match <br />';
		$ok = false;
	}

	if (strlen($userPass) < 8) {
		echo 'The password is too short, must be 8 or more characters <br />';
		$ok = false;
	}

	if (empty($email)) {
		echo 'You must enter an email address <br />';
		$ok = false;
	}

	//If the email and passwords are ok
	if ($ok) {
		//Step 1 - connect to the db
		require_once('db.php');
		//Step 2 - create a SQL command
		$sql = "INSERT INTO users VALUES(:email, :userName, :userPass)";
		//Step 2.5 - hash the password
		$userPass = password_hash($userPass, PASSWORD_DEFAULT);
		//Step 3 - prepare and execute the command
		$cmd = $conn->prepare($sql);
		$cmd->bindParam('email', $email, PDO::PARAM_STR, 120);
		$cmd->bindParam('userName', $userName, PDO::PARAM_STR, 100);
		$cmd->bindParam('userPass', $userPass, PDO::PARAM_STR, 255);
		try {
			$cmd->execute();
		}
		catch (Exception $e) {
			echo $e->getMessage();
			if (strpos($e->getMessage(), 'Integrity constraint violation: 1062') == true) {
				header('location:registration.php?errorMessage=email-already-exists');
			}
		}
		//Step 4 - disconnect from db
		$conn = null;
		//Step 5 - redirect to login page
		header('location:login.php');
	}
?>
</body>
</html>
