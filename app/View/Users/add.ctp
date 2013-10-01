<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset id="signIn">
        <legend><?php echo __('Sign In'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('manager' => 'Manager','band'=>'Band','other'=>'Other')
        ));
    ?>
	<?php echo $this->Form->end(__('Ajouter'));?>
    </fieldset>
</div>