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
	<!-- NAV-BAR -->
	<nav class="navbar has-background-light p-1">
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
	<!-- MAIN -->
	<!-- SECTION -->
	<section class="hero is-primary is-xs box">
		<div class="hero-head">
			<nav class="navbar">
				<div class="container">
					<div class="navbar-brand">
						<a class="navbar-item">
							<input class="input tekst-center" type="text" placeholder="Search" style="width: 66vw" />
						</a>
					</div>
					<div id="navbarMenuHeroA" class="navbar-menu">
						<div class="navbar-end">
							<span class="navbar-item">
								<a class="button is-primary is-inverted" href="./upload.php">
									<span>New Post</span>
								</a>
							</span>
							<a class="navbar-item">
                            Account
                          </a>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<div class="hero-body" style="padding-top: 2%; margin: 0% 12%">
			<!-- BOX-BEGIN -->
			<div class="container has-text-centered">
				<?php
				include_once "./read.php";

				// Retrieve the current user's ID from the session or any other source
				$userId = $_SESSION['id']; // Assuming you have stored the user's ID in the session

				// Retrieve and display the posts
				$posts = getPosts($userId);

				foreach ($posts as $post) {
					$postId = $post['id'];
					$postUserId = $post['User_ID'];
					$postTitle = $post['Titel'];
					$postText = $post['Text'];
					$postImage = $post['Media'];
					$postLikes = $post['Likes'];

					// Render the post HTML snippet for each post
					echo '<div class="container has-text-centered">
            <div class="box mt-6">
                <div class="columns">
                    <div class="column is-11 content-image">
                        <img src="' . $postImage . '" class="image" alt="Post" />
                    </div>
                    <div class="column is-1">
                        <div class="columns is-vcentered is-multiline">
                            <div class="column is-12">
                                <div class="notification">
                                    <i class="fa-solid fa-arrow-up fa-xl"></i>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="notification">
                                    <i class="fa-solid fa-arrow-down fa-xl"></i>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="notification">
                                    <i class="fa-regular fa-comment fa-xl"></i>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="notification">
                                    <i class="fa-sharp fa-regular fa-hashtag fa-xl"></i>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="notification">
                                    <i class="fa-solid fa-user fa-xl"></i>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="notification">
                                    <i class="fa-solid fa-ellipsis fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
				}
				?>

			</div>

			
		</div>
	</section>
	<footer class="footer footer-top">
		<div class="content has-text-centered">
			<p>
				This project is made by <strong>Oliver Boros</strong> and <strong>Stefano Ceoldo</strong>.
				This code is copyrighted. The website is supported by
				<a href="https://glr.nl">Grafisch Lyceum Rotterdam</a>.
			</p>
		</div>
	</footer>
</body>
<script src="https://kit.fontawesome.com/1f8796d395.js" crossorigin="anonymous"></script>
<script src="./js/BulmaHamburgToggle.js"></script>

</html>