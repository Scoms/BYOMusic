<h1>Add User</h1>

<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'manager' => 'Manager','band'=>'Band')
        ));
    ?>
	<?php echo $this->Form->end(__('Ajouter'));?>
    </fieldset>
</div>