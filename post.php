<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once "./loginCheck.php";
include_once "config.php";
include_once "./ProcessPicture.php";

$title = $_POST['title'];
$text = $_POST['text'];
$media;

if (isset($_FILES['picture'])) {
	// Get file details
	$file_name = $_FILES['picture']['name'];
	$file_size = $_FILES['picture']['size'];
	$file_temp = $_FILES['picture']['tmp_name'];
	$file_type = $_FILES['picture']['type'];

	$path = 'uploads/' . $_SESSION['id'] . '/';
	$ramdomFileName = bin2hex(random_bytes(64));
	if (!file_exists($path)) {
		if (mkdir($path, 0777, true)) {
			echo "Directory created successfully.";
		} else {
			echo "Failed to create the directory.";
		}
	}
	// Move uploaded file to a permanent location
	if (move_uploaded_file($file_temp, $path . $file_name)) {
		echo "File uploaded successfully.";
		process($path, $file_name, $ramdomFileName);
		process4x3($path, $file_name, $ramdomFileName);
		unlink($path . $file_name);
		$media = $path . $ramdomFileName . '.jpg';
	} else {
		echo "Error uploading file.";
	}
}

$title = mysqli_real_escape_string($mysqli, $title);
$text = mysqli_real_escape_string($mysqli, $text);
$media = mysqli_real_escape_string($mysqli, $media);

$query = "INSERT INTO `Post`(`User_ID`, `Titel`, `Text`, `Media`) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($mysqli, $query);

if ($stmt) {
	mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['id'], $title, $text, $media);
	mysqli_stmt_execute($stmt);

	if (mysqli_stmt_affected_rows($stmt) > 0) {
		mysqli_stmt_close($stmt);
		echo "Post posted now do some other shit ";
		header('Location: ./index.php');
	} else {
		mysqli_stmt_close($stmt);
		echo "how did you fuck this up?";
	}

	mysqli_stmt_close($stmt);
} else {
	echo "Bruv what. Error: " . mysqli_error($mysqli);
}
