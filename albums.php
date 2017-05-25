<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Albums</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
	<h1>Albums</h1>
	<a href="AlbumDetails.php" >Add a new Album</a>

	<?php
		//Step 1 - connect to the db
		$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200340662', 'gc200340662','uozYSDupBu');
		//Step 2 - create a SQL command
		$sql = "SELECT * FROM albums";
		//Step 3 - prepare the command
		$cmd = $conn->prepare($sql);
		//Step 4 - execute and store results
		$cmd->execute();
		$albums = $cmd->fetchAll();
		//Step 5 - disconnect db
		$conn = null;

		//Create a table and display the results
		echo '<table class="table table-striped table-hover">
			<tr><th>Title</th>
				<th>Year</th>
				<th>Artist</th>
				<th>Genre</th></tr>';
		foreach ($albums as $album) {
			echo '<tr>	<td>'.$album['title'].'</td>
						<td>'.$album['year'].'</td>
						<td>'.$album['artist'].'</td>
						<td>'.$album['genre'].'</td>';
		}
		echo '</table>';
	?>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
