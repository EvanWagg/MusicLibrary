<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Saving Album...</title>
</head>
<body>
	<?php
		$albumID = $_POST['albumID'];
		$title = $_POST['title'];
		$year = $_POST['year'];
		$artist = $_POST['artist'];
		$genre = $_POST['genre'];
		$coverFileName = $_FILES['coverFile']['name'];
		$coverFileType = $_FILES['coverFile']['type'];
		$coverFileTmpLocation = $_FILES['coverFile']['tmp_name'];

		echo 'File name:'.$coverFileName.'<br />';
		echo 'File type:'.$coverFileType.'<br />';
		echo 'File temp name:'.$coverFileTmpLocation.'<br />';
		echo 'The real file type is: '.mime_content_type($coverFileTmpLocation).'<br />';

		//check to ensure that the file uploaded is an image
		$validFileType = ['image/jpg', 'image/jpeg', 'image/png', 'image/svg', 'image/gif'];
		$fileType = mime_content_type($coverFileTmpLocation);

		//store the file on our server
		if (in_array($fileType, $validFileType)) {
			$fileName = "uploads/".uniqid("", true).$coverFileName;
			move_uploaded_file($coverFileTmpLocation, $fileName);
		}

		//Step 1 -  conenct to the db
		require_once('db.php');
		//Step 2 - create the SQL command and INSERT or UPDATE a record
		if (!empty($albumID)) {
			$sql = "UPDATE albums
						SET title = :title,
							year = :year,
							artist = :artist,
							genre = :genre,
							coverFile = :coverFile
					WHERE albumID = :albumID";
		}
		else {
			$sql = "INSERT INTO albums (title, year, artist, genre, coverFile) 
							VALUES (:title, :year, :artist, :genre, :coverFile);";
		}
		//Step 3 - prepare SQL command and prevent SQL injection
		$cmd = $conn->prepare($sql);
		$cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
		$cmd->bindParam(':year', $year, PDO::PARAM_INT, 4);
		$cmd->bindParam(':artist', $artist, PDO::PARAM_STR, 50);
		$cmd->bindParam(':genre', $genre, PDO::PARAM_STR, 20);
		$cmd->bindParam(':coverFile', $fileName, PDO::PARAM_STR, 100);

		if (!empty($albumID))
			$cmd->bindParam(':albumID', $albumID, PDO::PARAM_INT);
		//Step 4 - execute
		$cmd->execute();
		//Step 5 - disconnect from db
		$conn = null;
		//Step 6 - redirect to albums page
		header('location:albums.php');
	?>
</body>
</html>
