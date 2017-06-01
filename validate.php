<?php
$email = $_POST['email'];
$userPass = $_POST['userPass'];

//Step 1 - connect to the db
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200340662', 'gc200340662','uozYSDupBu');

//Step 2 - build the SQL command
$sql = "SELECT * FROM users WHERE email = :email";

//Step 3 - bind parameters and execute
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
$cmd->execute();
$user = $cmd->fetch();
//Step 4 - validate user
if (password_verify($userPass, $user['userPass'])) {
	//excellent we have a valid password
	session_start();
	$_SESSION['email'] = $user['email'];
	$_SESSION['userName'] = $user['userName'];
	header('location:albums.php');
}
else {
	//user was not found or did not have a valid password
	header('location:login.php?invalid=true');
	exit();
}
//Step 5 - disconnect from the db
$conn = null;
?>
