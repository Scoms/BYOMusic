
<?php 
	echo $this->Html->css("gmap_halls");
	if($editable){
	echo $this->element('submenu_manager');
}
?>

<div class="titleDisplay">
	<h1><?php echo $manager['Manager']['name'] ?></h1>

	<table class="full">
		<tr>
			<th>Hall</th>
			<th>Events</th>
		</tr>
		
		<?php foreach ($halls as $hall) : ?>
				<tr>
					<td><?php echo $hall['Hall']['name'] ?></td>
					<td>
						<?php if(AuthComponent::user('role') == ('manager')) :?>
							<?php echo $this->Html->link('Remove',array('controller' => 'halls', 'action' => 'remove', $hall['Hall']['id'])) ?>
						<?php endif ?>
					</td>
					<?php foreach ($hall['Event'] as $event ): ?>
						</tr>
						<td></td>
						<td>
							<?php echo ($this->Html->link($event['date']." : ". $event['label'],array('controller' => 'events', 'action' => 'edit', $event['id']))) ?>
							
						</td>
						<tr>
					<?php endforeach ?>
				</tr>
		<?php endforeach ?>
	</table>
</div>
