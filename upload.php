<?php
require_once "./loginCheck.php";
?>

<!DOCTYPE html>
<html>

<head>
	<title>Upload a Picture</title>
</head>

<body>
	<h1>Upload a Picture</h1>
	<form action="post.php" method="post" enctype="multipart/form-data">
		<label for="title">Title: </label>
		<input type="text" name="title" /><br /><br />

		<label for="title">Text: </label>
		<textarea name="text" cols="30" rows="10"></textarea><br /><br />

		<label for="title">Picture: </label>
		<input type="file" name="picture" /><br /><br />

		<br />
		<input type="submit" value="Upload" />
	</form>
</body>

</html>