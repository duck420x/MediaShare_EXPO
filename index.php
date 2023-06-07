<?php
include "./loginCheck.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Home</title>
	<link rel="stylesheet" href="./style/style.css" />
</head>

<body>
	<nav class="navbar has-background-light box p-1">
		<div class="navbar-brand">
			<logo class="nav-item logo">
				<!-- //-- Mogelijkheid voor logo --// -->
				<img src="./images/NoBgLogoRemake.svg" alt="Logo" style="max-height: 70px" class="p-2 shadow" />
			</logo>
			<!-- //-- Hamburger voor mobiele navbar --// -->
			<burger class="navbar-burger" id="burger">
				<span></span>
				<span></span>
				<span></span>
			</burger>
		</div>
		<div class="navbar-menu is-12 r-0" id="nav-links">
			<!-- //-- 'start' ipv 'end' is om de 'items' direct naast de logo te krijgen --// -->
			<div class="navbar-end pr-5">
				<a href="" class="navbar-item">pagina1</a>
				<a href="" class="navbar-item">pagina2</a>
				<a href="" class="navbar-item">pagina3</a>
			</div>
		</div>
	</nav>
	<section class="hero is-link is-fullheight-with-navbar">
		<div class="hero-body">
			<p class="title">
				<img src="./images/NoBgLogoRemake.svg" alt="Logo" />
			</p>
			<div class="subtitle buttons">
				<button class="button is-primary"><a href="./login.html">Login</a></button>
				<button class="button is-warning"><a href="./register.html">Register</a></button>
				<button class="button is-danger"><a href="./logout.php">Logout</a></button>
			</div>
		</div>
	</section>
</body>
<script src="./js/BulmaHamburgToggle.js"></script>

</html>