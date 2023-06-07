<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

if (isset($_SESSION['id'])) {
	if ($_SESSION['id'] == '') {
		echo "sessie is leeg";
		header('Location: login.html');
	}
} else {
	echo "geen sessie";
	header('Location: login.html');
}
