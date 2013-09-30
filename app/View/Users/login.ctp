<h1>Sign In</h1>

<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
<div class="users form">
	<fieldset>  
		<legend>
			<?php echo __('Please enter your login and password'); ?></legend>
        	<?php echo $this->Form->input('username');
        	echo $this->Form->input('password');?>
			<?php echo $this->Form->end(__('Connexion'));?>
	</fieldset>
</div>