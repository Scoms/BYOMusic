<div class="titleDisplay">
	<h1>Bring Your Own Music</h1>
	<h2>Looking for something ?</h2>
	<p>
		<ipnut id="searchBox" type="text" style='width:200px;'/>
	</p>
</div>

<div class="rightDisplay">
	<div class="tableDisplay left equals" id="home_bands">
		<h1>Last bands registred</h1>
		<table>
			<tr class="header">
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
	<div class="tableDisplay right equals" id="home_live">
		<h1>Last Events noticed</h1>
		<table>
			<tr class="header">
				<th>Place</th>
				<th>Description</th>
			</tr>
			<?php foreach ($events as $event): ?>
			<tr >
				<td>
					<?php echo $event["Hall"]["name"]; ?>
				</td>
				<td>
					<?php echo $event["Event"]["description"]; ?>
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>

<script type="text/javascript" src='js/homepage.js'></script>