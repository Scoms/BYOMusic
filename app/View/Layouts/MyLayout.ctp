<!DOCTYPE HTML>

<html>

<head>
	<title>
		BYOMusic <?php echo $title_for_layout; ?>
	</title>
	<!-- Javascript Files -->

	<!-- CSS Files -->
	<?php 
		echo $this->Html->css("navbar.css");
		echo $this->Html->css("global.css");
	?>
</head>

<!-- Let the bodies hit the floor @Drowing Pool-->
<body>
	<!-- Navigation Bar-->
	<ul class="navbar">
		<li>
			<?php echo $this->Html->link('BYOMusic',array('controller' => 'Home', 'action' => 'index')); ?>
		</li>
		<li class="accountButtons">
			<?php echo $this->Html->link('Sign In',array('controller' => 'users', 'action' => 'login')); ?>
        </li>
		<li class="accountButtons">
			<?php echo $this->Html->link('Register',array('controller' => 'users', 'action' => 'add')); ?>
		</li>
	</ul>
	
	<!-- Content -->
	<div class="content">
		<?php echo $this->fetch('content') ?>
	</div>
</body>
</html>