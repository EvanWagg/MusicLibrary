<?php
	$pageTitle = 'Albums';
	require_once('header.php');
?>
<main class="container">
	<h1>Albums</h1>
	<?php
	if (!empty($_SESSION['email']))
		echo '<a href="AlbumDetails.php" >Add a new Album</a>';
	?>

	<?php
		//Step 1 - connect to the db
		require_once('db.php');
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
				<th>Genre</th>
				<th>Cover Image</th>';

		if (!empty($_SESSION['email'])) {
			echo 	'<th>Edit</th>
					<th>Delete</th>';
		}
		echo '</tr>';

		foreach ($albums as $album) {
			echo '<tr>	<td>'.$album['title'].'</td>
						<td>'.$album['year'].'</td>
						<td>'.$album['artist'].'</td>
						<td>'.$album['genre'].'</td>
						<td><img height="50" src='.$album['coverFile'].'></td>';
			if (!empty($_SESSION['email'])) {
				echo 	'<td><a href="AlbumDetails.php?albumID='.$album['albumID'].'" class="btn btn-primary">Edit</a></td>
						<td><a href="deleteAlbum.php?albumID='.$album['albumID'].'" class="btn btn-danger confirmation">Delete</a></td>';
			}
			echo '</tr>';
		}
		echo '</table></main>';

		include_once('footer.php');
	?>