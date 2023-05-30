<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include_once "config.php";

// $uName = $_POST['uName'];
// $pWord = $_POST['pWord'];

$uName = 'testingUname';
$pWord = 'password';

// Generate a random salt for bcrypt
$salt = bin2hex(random_bytes(256));
echo $salt;
// Generate the password hash using the salt
$hash = password_hash($pWord . $salt, PASSWORD_BCRYPT, ['cost' => 14]);

// generate a random tag for the user
$tag = '';
for ($i = 0; $i < 4; $i++) {
	$tag .= mt_rand(0, 9);
}

$uName = mysqli_real_escape_string($mysqli, $uName);
$tag = mysqli_real_escape_string($mysqli, $tag);
$hash = mysqli_real_escape_string($mysqli, $hash);
$salt = mysqli_real_escape_string($mysqli, $salt);

$query = "INSERT INTO `User`(`GebruikersNaam`, `NameTag`, `Hash`, `Salt`) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($mysqli, $query);

if ($stmt) {
	mysqli_stmt_bind_param($stmt, "ssss", $uName, $tag, $hash, $salt);
	mysqli_stmt_execute($stmt);

	if (mysqli_stmt_affected_rows($stmt) > 0) {
		echo "Registration is gud boyy";
	} else {
		echo "uhm yeah thats not good try again pls lol";
	}

	mysqli_stmt_close($stmt);
} else {
	echo "Bruv what. Error: " . mysqli_error($mysqli);
}
