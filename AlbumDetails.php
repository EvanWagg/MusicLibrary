<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Album Details</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<h1>Album Details</h1>
		<form method="post" action="saveAlbum.php">
			<!-- Title -->
			<fieldset class="form-group">
				<label for="title" class="col-sm-1">Title: *</label>
				<input name="title" id="title" placeholder="Album title" required />
			</fieldset>
			<!-- Year -->
			<fieldset class="form-group">
				<label for="year" class="col-sm-1">Year:</label>
				<input name="year" id="year" type="number" min="1900" placeholder="Release year" required />
			</fieldset>
			<!-- Artist -->
			<fieldset class="form-group">
				<label for="artist" class="col-sm-1">Artist: *</label>
				<input name="artist" id="artist" placeholder="Artist name" required />
			</fieldset>
			<button class="btn btn-success col-sm-offset-1">Save</button>
		</form>
	</main>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
