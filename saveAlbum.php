<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Saving Album...</title>
</head>
<body>
	<?php
		$title = $_POST['title'];
		$year = $_POST['year'];
		$artist = $_POST['artist'];

		echo 'title: '.$title.'<br />';
		echo 'year: '.$year.'<br />';
		echo 'artist: '.$artist.'<br />';

		//Step 1 -  conenct to the db
		$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200340662', 'gc200340662','uozYSDupBu');
		//Step 2 - create the SQL command and INSERT a record
		$sql = "INSERT INTO albums (title, year, artist) 
							VALUES (:title, :year, :artist);";
		//Step 3 - prepare SQL command and prevent SQL injection
		$cmd = $conn->prepare($sql);
		$cmd->bindParam('title', $title, PDO::PARAM_STR, 50);
		$cmd->bindParam('year', $year, PDO::PARAM_INT, 4);
		$cmd->bindParam('artist', $artist, PDO::PARAM_STR, 50);
		//Step 4 - execute
		$cmd->execute();
		//Step 5 - disconnect from db
		$conn = null;
		//Step 6 - redirect to albums page
	?>
</body>
</html>