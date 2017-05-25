<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Deleting Album...</title>
</head>
<body>
<?php
	//Step 1 - connect to the db
	$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200340662', 'gc200340662','uozYSDupBu');
	//Step 2 - create SQL command
	$sql = "DELETE FROM albums WHERE albumID = :albumID";
	//Step 3 - prepare & execute command
	$cmd = $conn->prepare($sql);
	$cmd->bindParam(':albumID', $_GET['albumID'], PDO::PARAM_INT);
	$cmd->execute();
	//Step 4 - disconnect from db
	$conn = null;
	//Step 5 - redirect to albums.php
	header('location:albums.php');
?>
</body>
</html>
