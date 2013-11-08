<div class="textDisplay">
	<h1>Bring Your Own Music</h1>
</div>

<div class="rightDisplay">
	<div class="tableDisplay" id="home_bands">
		<h1>Last bands registred</h1>
		<table>
			<tr>
				<th>Name</th>
				<th>Created</th>
			</tr>
			<?php foreach ($bands as $band): ?>
			<tr >
				<td>
					<?php echo $this->Html->link($band['Band']['name'],array(
						'controller' => 'bands',
						'action' => 'view',
						$band['User']['id']));
					?>
				</td>
				<td><?php echo $band['User']['created'] ?></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
	<div class="tableDisplay" id="home_live">
		<h1>Live around you</h1>
	</div>
</div>