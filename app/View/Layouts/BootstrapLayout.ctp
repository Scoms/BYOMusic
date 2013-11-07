<!DOCTYPE HTML>

<html>

<head>
	<title>
		BYOMusic <?php echo $title_for_layout; ?>
	</title>
	<!-- Javascript Files -->
	<?php
		echo $this->Html->script('jquery');
		echo $this->Html->script('select2/select2.min');
		echo $this->Html->script('bootstrap/bootstrap.min.js');
	?>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<!-- CSS Files -->
	
	<?php 
		echo $this->Html->css('bootstrap/bootstrap-theme.min.css');
		echo $this->Html->css('bootstrap/bootstrap.min.css');
	?>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<!-- Auto Imports -->
</head>

<!-- Let the bodies hit the floor @Drowing Pool-->
<body>
	<!-- Navigation Bar-->
	<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		     	<span class="sr-only">Toggle navigation</span>
		    	<span class="icon-bar"></span>
	    		<span class="icon-bar"></span>
	    		<span class="icon-bar"></span>
	    	</button>
	    <?php echo $this->Html->link('BYOMusic',array('controller' => 'Home', 'action' => 'index'),array('class'=>'navbar-brand')); ?>
	    </div>
	  <!-- Collect the nav links, forms, and other content for toggling -->
	 	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	<ul class="nav navbar-nav">
		    	<?php if(AuthComponent::user('username')): ?>
					<li>
						<?php if(strtoupper(AuthComponent::user('role'))=='BAND'): ?>
							<?php echo $this->Html->link(AuthComponent::user('username'),array(
								'controller' => 'bands',
								'action' => 'view',
								AuthComponent::user('id'))); 
							?>
						<?php elseif (strtoupper(AuthComponent::user('role'))=='MANAGER'): ?>
							<?php echo $this->Html->link(AuthComponent::user('username'),array('controller' => 'managers', 'action' => 'view')); ?>

						<?php endif ?>
					</li>
				<?php endif ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
		    	<?php if(AuthComponent::user('username')): ?>
					<li >
						<?php echo $this->Html->link('Log Out',array('controller' => 'users', 'action' => 'logout')); ?>
			        </li>
		    	<?php else: ?>
					<li >
						<?php echo $this->Html->link('Log In',array('controller' => 'users', 'action' => 'login')); ?>
			        </li>
					<li>
						<?php echo $this->Html->link('Sign In',array('controller' => 'users', 'action' => 'add')); ?>
					</li>
				<?php endif ?>
			</ul>
	  </div><!-- /.navbar-collapse -->
	</nav>
	
	<!-- Content -->
	<div class="content well">
		<?php
			echo $this->Session->flash();
			echo $this->fetch('content');
		?>
	</div>
</body>
</html>