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
<div class="rightDisplay">
	<div class="tableDisplay concrete">
		<h1>Halls</h1>
		<table>
			<th>
				<td>Name</td>
				<td>location</td>
			</th>
		</table>
		<br/>
	</div>
</div>