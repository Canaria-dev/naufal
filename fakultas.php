<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>IAIN PALANGKA RAYA</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords"
		content="Scholarly web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--// Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
	<link rel="stylesheet" href="css/swipebox.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<!-- //css files -->
	<!-- online-fonts -->
	<link
		href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext"
		rel="stylesheet">
	<link
		href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext"
		rel="stylesheet">
	<!-- //online-fonts -->
	<style>
		.container5 {
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			max-width: 1200px;
			margin: auto;
			background: #fff;
			overflow: auto;
			justify-content: center;
			gap: 10px;
			text-align: center;
			/* Center text */
		}

		.gallery {
			border: 1px solid #ccc;
			width: 390px;
			align-items: center;
			align-content: center;
			padding: 20px;
			/* Add padding to the container */
		}

		.gallery img {
			width: 100%;
			height: 200px;
		}

		.desc h3 {
			padding: 15px;
			text-align: center;
		}

		.judul h2 {
			margin-top: 20px;
		}

		.warna-teks {
			margin-left: 5px;
			color: #000000;
		}

		h1 {
			display: flex;
			align-items: start;
			/* Center content vertically */
			justify-content: center;
			/* Center content horizontally */
			height: 8vh;
			/* Set height to 100% of the viewport height */
			margin: 0;
			/* Remove default margin */
		}

		.navbar-brand {
			display: flex;
			align-items: first baseline;
		}

		.navbar-brand img {
			max-height: 30px;
			max-width: auto;
			/* Adjust as needed */
			margin-right: 10px;
			/* Adjust as needed for spacing between logo and text */
		}
	</style>
</head>

<body>
	<div class="main_section_agile" id="home">
		<div class="agileits_w3layouts_banner_nav">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1>
						<a class="navbar-brand" href="index.php">
							<img src="foto/logo.jpg" alt="Your Logo" />
							IAIN PALANGKA RAYA
						</a>
					</h1>
				</div>
				<div class="w3layouts_header_right">
					<form action="#" method="post">


					</form>
				</div>


				<?php
				@session_start();
				if (empty($_SESSION['user'])) {
					//echo "<a href='./Login'> Login </a>";
					echo "
				<ul class='agile_forms'>
				<li><a class='active' href='#' data-toggle='modal' data-target='#myModal2'><i class='fa fa-sign-in' aria-hidden='true'></i> Masuk </a> </li>
				</ul>";
				} else {
					echo "
						
						<ul class='agile_forms'>
							<div class='dropdown'>
							<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							$_SESSION[user] <span class='caret'></span>
							</button>
							<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<table class='table'>
							<tr><td><a class='dropdown-item' href='#'>Profil</a> </td></tr>
							<tr><td><a class='dropdown-item' href='nilai.php'>Cek Nilai action</a></td></tr>
							<tr><td><a class='dropdown-item' href='logout.php'>Logout</a></td></tr>
							</table>
							</div>
							</div>
						</ul>
						
					 ";
					//echo "<a href='1.php'> Login </a>";
				}
				?>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php" class="effect-3">Beranda</a></li>
							<li><a href="fakultas.php" class="effect-3">Fakultas </a></li>
							<li>
								<a href="profile_kampus.php" class="effect-3">Profil Kampus</a>
							</li>
							<li><a href="kontak.php" class="effect-3">Kontak Kami</a></li>
						</ul>
					</nav>
				</div>
			</nav>
			<div class="clearfix"> </div>
		</div>
	</div>

	<!-- Modal1 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="signin-form profile">
						<h3 class="agileinfo_sign">Masuk</h3>
						<div class="login-form">
							<form action="proses_login.php" method="post">
								<input type="text" name="username" placeholder="Username" required="">
								<input type="password" name="password" placeholder="Password" required="">
								<div class="tp">
									<input type="submit" value="Masuk">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- Modal2 -->
	<center>
		<br>
		<br>
		<h2>Fakultas di Kampus IAIN PALANGKA RAYA</h2>
		<br>
		<br>
	</center>
	<div class="container5">
		
		<div class="gallery">
			<img src="foto/FTIK.jpg">
			<div class="desc"> <a href="https://ftik.iain-palangkaraya.ac.id/">
				<h3>FTIK</h3></a>
			</div>
		</div>
		<div class="gallery"> 
			<img src="foto/FUAD.png"><a href="https://fuad.iain-palangkaraya.ac.id/">
			<div class="desc"> 
				<h3>FUAD</h3> </a>
			</div>
		</div>
		<div class="gallery">
			<img src="foto/FSYA.png">
			<div class="desc"><a href="https://fsya.iain-palangkaraya.ac.id/">
				<h3>FSYA</h3></a>
			</div>
		</div>
		<div class="gallery">
			<img src="foto/FEBI.png"> <a href="https://febi.iain-palangkaraya.ac.id/">
			<div class="desc">
				<h3>FEBI</h3> </a>
			</div>
		</div>
		<div class="gallery">
			<img src="foto/pascasarjana.png"> 
			<div class="desc"> <a href="https://pasca.iain-palangkaraya.ac.id/">
				<h3>Pasca Sarjana</h3> </a>
			</div>
		</div>


	</div>

<br><br>


	<!-- footer -->

	<div class="w3layouts_copy_right">
		<div class="container">
			<p>© 2024 IAIN PALANGKA RAYA</a></p>
		</div>
	</div>
	<!-- //footer -->

	<!-- js-scripts -->
	<!-- js-files -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js-files -->
	<!-- Baneer-js -->


	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smooth scrolling -->
	<!-- stats -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
	<!-- //stats -->
	<!-- moving-top scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">
		</span></a>
	<!-- //moving-top scrolling -->
	<!-- gallery popup -->
	<script src="js/jquery.swipebox.min.js"></script>
	<script type="text/javascript">
		jQuery(function ($) {
			$(".swipebox").swipebox();
		});
	</script>
	<!-- //gallery popup -->
	<!--/script-->
	<script src="js/simplePlayer.js"></script>
	<script>
		$("document").ready(function () {
			$("#video").simplePlayer();
		});
	</script>
	<!-- //Baneer-js -->
	<!-- Calendar -->
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker").datepicker();
		});
	</script>
	<!-- //Calendar -->

	<!-- //js-scripts -->
</body>

</html>