<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once "config.php";

$uName = $_GET['uName'];
$tag = $_GET['tag'];

$uName = mysqli_real_escape_string($mysqli, $uName);
$tag = mysqli_real_escape_string($mysqli, $tag);

$query = "SELECT `Hash`, `Salt` FROM `User` WHERE `GebruikersNaam` = ? AND `NameTag` = ?";
$stmt = mysqli_prepare($mysqli, $query);

if ($stmt) {
	mysqli_stmt_bind_param($stmt, "ss", $uName, $tag);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $hash, $salt);

	if (mysqli_stmt_fetch($stmt)) {
		echo "Hash: " . $hash . "<br>";
		echo "Salt: " . $salt . "<br>";
	} else {
		echo "No results found.";
	}

	mysqli_stmt_close($stmt);
} else {
	echo "Error: " . mysqli_error($mysqli);
}