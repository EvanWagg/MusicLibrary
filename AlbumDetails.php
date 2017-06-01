<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Album Details</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
	<main class="container">
		<h1>Album Details</h1>
		<?php
			if (!empty($_GET['albumID']))
				$albumID = $_GET['albumID'];
			else
				$albumID = null;
			$title = null;
			$year = null;
			$artist = null;
			$genrePicked = null;

			//If the albumID exists, it is an edit situation and we need to load the album from the db
			if (!empty($albumID)) {
				require_once('db.php');
				$sql = "SELECT * FROM albums WHERE albumID = :albumID";
				$cmd = $conn->prepare($sql);
				$cmd->bindParam(':albumID', $albumID, PDO::PARAM_INT);
				$cmd->execute();
				$album = $cmd->fetch();
				$conn = null;

				$title = $album['title'];
				$year = $album['year'];
				$artist = $album['artist'];
				$genrePicked = $album['genre'];
			}
		?>
		<form method="post" action="saveAlbum.php">
			<!-- Title -->
			<fieldset class="form-group">
				<label for="title" class="col-sm-1">Title: *</label>
				<input name="title" id="title" placeholder="Album title" value="<?php echo $title?>" required />
			</fieldset>
			<!-- Year -->
			<fieldset class="form-group">
				<label for="year" class="col-sm-1">Year:</label>
				<input name="year" id="year" type="number" min="1900" placeholder="Release year" value="<?php echo $year?>" required />
			</fieldset>
			<!-- Artist -->
			<fieldset class="form-group">
				<label for="artist" class="col-sm-1">Artist: *</label>
				<input name="artist" id="artist" placeholder="Artist name" value="<?php echo $artist?>" required />
			</fieldset>
			<!-- Genre -->
			<fieldset class="form-group">
				<label for="genre" class="col-sm-1">Genre: *</label>
				<select name="genre" id="genre" value="<?php echo $genre?>" required>
					<?php
						//Step 1 - connect to db
						//$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=root', 'gc200340662','uozYSDupBu');
						$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200340662', 'gc200340662','uozYSDupBu');
						//Step 2 - create the SQL statement
						$sql = "SELECT * FROM genres";
						//Step 3 - prepare & execute statement
						$cmd = $conn->prepare($sql);
						$cmd->execute();
						$genres = $cmd->fetchAll();
						//Step 4 - loop over the results to build the list with <option> </option>
						$optcheck = '<option selected>Please select a genre</option>';
						echo $optcheck;
						foreach ($genres as $genre) {
							if ($genrePicked == $genre['genre'])
								echo '<option selected>'.$genre['genre'].'</option>';
							else
								echo '<option>'.$genre['genre'].'</option>';
						}
						//Step 5 - disconnect from db
						$conn = null;
					?>
				</select>
			</fieldset>
			<!-- Hidden Field -->
			<input name="albumID" id="albumID" value="<?php echo $albumID?>" type="hidden" />
			<button class="btn btn-success col-sm-offset-1">Save</button>
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
