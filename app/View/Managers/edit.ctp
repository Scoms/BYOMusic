<?php 
	echo $this->element('submenu_manager');
?>
<div class="textDisplay">
	<h1>Edit </h1>
	<?php echo $this->Form->create('Manager') ?>
  		  <p><?php echo $this->Form->input('id',array('type'=>'hidden')) ?></p>
		<p><?php echo $this->Form->input('name',array('label'=>'Name : ')) ?></p>
	<?php echo $this->Form->end('Update') ?>
</div>
