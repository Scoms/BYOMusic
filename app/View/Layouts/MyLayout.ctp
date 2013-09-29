<!DOCTYPE HTML>

<html>

<head>
	<title>
		BYOMusic <?php echo $title_for_layout; ?>
	</title>
	<!-- Javascript Files -->

	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="/BYOMusic/css/navbar.css">
	<link rel="stylesheet" type="text/css" href="/BYOMusic/css/global.css">
</head>

<!-- Let the bodies hit the floor @Drowing Pool-->
<body>
	<!-- Navigation Bar-->
	<ul class="navbar">
		<li>BYOMusic</li>
		<li class="accountButtons">Sign In</li>
		<li class="accountButtons">Register</li>
	</ul>
	
	<!-- Content -->
	<div class="content">
		<?php echo $this->fetch('content') ?>
	</div>
</body>
</html>