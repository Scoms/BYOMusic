<!DOCTYPE HTML>

<html>

<head>
	<title>
		BYOMusic <?php echo $title_for_layout; ?>
	</title>
	<!-- Javascript Files -->
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="Javascript"> </script>
	<?php
		echo $this->Html->script('jquery');
		echo $this->Html->script('homepage.js');
		echo $this->Html->script('select2/select2.min');
		echo $this->Html->script('select2/select2.min');
	?>
	<!-- CSS Files -->
	<?php 
		echo $this->Html->css("navbar");
		echo $this->Html->css("global");
		echo $this->Html->css("global.responsive");
		echo $this->Html->css("forms");
		echo $this->Html->css("message");
		echo $this->Html->css("table");
		echo $this->Html->css("bandDisplay");
		echo $this->Html->css("select2");
		echo $this->Html->css("dewplayer");
		echo $this->Html->css("bubbles");
	?>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<!-- Auto Imports -->
</head>

<!-- Let the bodies hit the floor @Drowing Pool-->
<body>
	<!-- Navigation Bar-->
	<ul class="navbar">
		<li>
			<?php
				echo $this->Html->link('BYOMusic',array('controller' => 'Home', 'action' => 'index'));
			?>
		</li>
		<?php if(AuthComponent::user('username')): ?>
			<li>
				<?php if(strtoupper(AuthComponent::user('role'))=='BAND'): ?>
					<?php echo $this->Html->link(AuthComponent::user('username'),array(
						'controller' => 'bands',
						'action' => 'view',
						AuthComponent::user('id'))); 
					?>
				<?php elseif (strtoupper(AuthComponent::user('role'))=='MANAGER'): ?>
					<?php echo $this->Html->link(AuthComponent::user('username'),array('controller' => 'managers', 'action' => 'in')); ?>
				<?php endif ?>
			</li>
			<li class="accountButtons">
				<?php echo $this->Html->link('Log Out',array('controller' => 'users', 'action' => 'logout')); ?>
	        </li>
		<?php else: ?>
			<li class="accountButtons">
				<a id="signIn" onClick="logInMenu()">Log In</a>
	        </li>
			<li class="accountButtons">	
				<?php echo $this->Html->link('Sign In',array('controller' => 'users', 'action' => 'add')); ?>
			</li>
		<?php endif ?>
	</ul>
	
	<!-- Forms -->
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User',array('url'=>array('controller'=>'Users','action'=>'logIn')));?>
	<div class="users form">
		<fieldset id="logIn">
	        	<?php echo $this->Form->input('username');
	        	echo $this->Form->input('password');?>
				<?php echo $this->Form->end(__('Connexion'));?>
		</fieldset>
	</div>
	<!-- Content -->
	<div class="content">
		<?php
			echo $this->Session->flash();
			echo $this->fetch('content');
		?>
	</div>
</body>
</html>