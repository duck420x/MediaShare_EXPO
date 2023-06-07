<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once "config.php";

$uName = $_POST['uName'];
$eMail = $_POST['eMail'];
$pWord = $_POST['pWord'];


// Generate a random salt for bcrypt
$salt = bin2hex(random_bytes(256));
// Generate the password hash using the salt
$hash = password_hash($pWord . $salt, PASSWORD_BCRYPT, ['cost' => 14]);

$uName = mysqli_real_escape_string($mysqli, $uName);
$eMail = mysqli_real_escape_string($mysqli, $eMail);
$hash = mysqli_real_escape_string($mysqli, $hash);
$salt = mysqli_real_escape_string($mysqli, $salt);

$query = "INSERT INTO `User`(`GebruikersNaam`, `Mail`, `Hash`, `Salt`) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($mysqli, $query);

if ($stmt) {
	mysqli_stmt_bind_param($stmt, "ssss", $uName, $eMail, $hash, $salt);
	mysqli_stmt_execute($stmt);

	if (mysqli_stmt_affected_rows($stmt) > 0) {
		mysqli_stmt_close($stmt);
		echo "Registration is gud boyy";
		header('Location: ./index.html');
	} else {
		mysqli_stmt_close($stmt);
		echo "uhm yeah thats not good try again pls lol";
	}

	mysqli_stmt_close($stmt);
	
	
} else {
	echo "Bruv what. Error: " . mysqli_error($mysqli);
}
