<?php

header("Location: index.php");
exit();

error_reporting(-1);
ini_set('display_errors', 'On');

include_once "./loginCheck.php";
include_once "config.php";

$title = $_POST['title'];
$text = $_POST['text'];
$media = $_POST['media'];


$title = mysqli_real_escape_string($mysqli, $title);
$text = mysqli_real_escape_string($mysqli, $eMail);
$media = mysqli_real_escape_string($mysqli, $media);

$query = "INSERT INTO `Post`(`User_ID`, `Title`, `Text`, `Media`) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($mysqli, $query);

if ($stmt) {
	mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['id'], $eMail, $hash, $salt);
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
