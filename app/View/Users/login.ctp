<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
<div class="users form">
	<fieldset id="logIn">  
		<legend>
			<?php echo __('Log In'); ?></legend>
        	<?php echo $this->Form->input('username');
        	echo $this->Form->input('password');?>
			<?php echo $this->Form->end(__('Connexion'));?>
	</fieldset>
</div>