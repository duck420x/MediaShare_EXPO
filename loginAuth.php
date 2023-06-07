<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once "config.php";


$eMail = $_POST['eMail'];
$password = $_POST['pWord'];

$eMail = mysqli_real_escape_string($mysqli, $eMail);

$query = "SELECT `id`, `Hash`, `Salt` FROM `User` WHERE `Mail` = ?";
$stmt = mysqli_prepare($mysqli, $query);

if ($stmt) {
	mysqli_stmt_bind_param($stmt, "s", $eMail);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $id, $hash, $salt);

	if (mysqli_stmt_fetch($stmt)) {
		if (password_verify($password . $salt, $hash) == 1) {
			session_start();
			$_SESSION['id'] = $id;
		}
	} else {
		echo "No results found.";
	}
	mysqli_stmt_close($stmt);
} else {
	echo "Error: " . mysqli_error($mysqli);
}
