<?php

include 'read.php';

$users = getUsers($_POST['search']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Comments</title>
		<link rel="stylesheet" href="../style/style.css" />
	</head>
    
	<body>
<!-- NAV-BAR -->
		<nav class="navbar has-background-light p-1">
			<div class="navbar-brand">
				<logo class="nav-item logo">
    <!-- //-- Mogelijkheid voor logo --// -->
					<img
						src="../images/NoBgLogoRemake.svg"
						alt="Logo"
						style="max-height: 70px"
						class="p-2 shadow"
					/>
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
					<a href="" class="navbar-item">LogOut</a>
				</div>
			</div>
		</nav>
<!-- MAIN -->
    <!-- SECTION -->
		<section class="hero is-primary is-xs box ">
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                      <div class="navbar-brand">
                        <a class="navbar-item">
                          <input class="input is-info tekst-center" type="text" placeholder="Search" style="width: 66vw;">
                        </a>
                      </div>
                      <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <span class="navbar-item">
                                <a class="button is-primary is-inverted" href="./upload.php">
                                  <span>New Post</span>
                                </a>
                              </span>
                              <!-- GELINKT WORDEN naar account -->
                          <a class="navbar-item" href=" ">
                            <i class="fa-solid fa-user fa-xl"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </nav>
                </div>
            </div>
			<div class="hero-body" style="padding-top: 2%;margin: 0% 12%;">
                <!-- BOX-BEGIN -->
                <div class="container">
                    <div class="box mt-7">
                      <div class='container'>
                        <div class='columns is-mobile is-centered'>
                          <div class='column is-12'>
                            <div>
                              <h1 class='title has-text-black'>Users:</h1>
                              <hr>
                            </div>
                            <table class='table followList'>
                              <tbody class="followUsers">
                                <tr>
                                  <td>
                                    <div class="columns is-12 is-multiline">
                                        foreach ($users as $user) {

                                            echo $user['GebruikersNaam'] . ' : ';

                                            echo '<form action="follow.php" method="post">';

                                            echo '<button type="submit">Volg</button>';

                                            echo '<input type="hidden" name="account" value="'.$user['id'].'"/>';

                                            echo '</form>';

                                        }  
                                    </div>
                                  </td>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="column is-12 flex-dis">
                        <button class="button">Terug</button>
                      </div>
                </div>
            </div>
		</section>
		<footer class="footer footer-top">
			<div class="content has-text-centered">
				<p>
					This project is made by <strong>Oliver Boros</strong> and <strong>Stefano Ceoldo</strong>. This code is copyrighted. The website is supported by
					<a href="https://login.microsoftonline.com/organizations/oauth2/v2.0/authorize?client_id=1ad0a931-a3e3-45c7-a778-cc53892ada3e&redirect_uri=https%3A%2F%2Fwww.mijnglr.nl%2Fsignin&response_type=code%20id_token&scope=openid%20profile&response_mode=form_post&nonce=638112711931803934.MjljZTlmMDYtZmY5NS00ZTVmLWEwZGUtOTczZjgyYzFkYTllMDNhZmI1ZmMtZGM1Yy00ZGI4LWE0NjgtZmEwOTk0NDlmZDg4&state=CfDJ8OMhQ234PsRDsOycIzXucd_z7w2UIY4NtiLPUjaEWdphejwbMpIwgJGUUip4bTEu6CZFjNPtbTEFX3dhx2BMEdIabW7xjbs-EPiy8zn3WFTOb0-PfLdRj7HE1dg4m8I8jlkyl4OFkkNFK7ue2IhqXvyh7EX1uJNpMT4bEs4n66J7Z_74RNwSidJky2gM_LtbQH5HV2J35LFt6R8gXR3MSUd0_b3pSwxsL6PxRlj3dKx2VE-G9yxealqECef6FmuRw9CCGR7TT4-8H2y2xxJjn5ML5ykmAyTMDd6gqG7Bs7aw&x-client-SKU=ID_NETSTANDARD2_0&x-client-ver=5.5.0.0">Grafisch Lyceum Rotterdam</a>.
				</p>
			</div>
		</footer>
	</body>
    <script src="https://kit.fontawesome.com/1f8796d395.js" crossorigin="anonymous"></script>
	<script src="../js/BulmaHamburgToggle.js"></script>
</html>
