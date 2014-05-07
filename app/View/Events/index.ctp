<div class="titleDisplay">
	<h1>Events</h1>
	<table>
		<tr>
			<th>Date</th>
			<th>Label</th>
			<th>Description</th>
			<?php if(AuthComponent::user('role') == "band"): ?>
				<th>Apply</th>
			<?php endif ?>
		</tr>
		<?php foreach ($events as $event): ?>
				<tr>
					<td><?php echo $event["Event"]["date"] ?></td>
					<td><?php echo $event["Event"]["label"] ?></td>
					<td><?php echo $event["Event"]["description"] ?></td>
					<?php if(AuthComponent::user('role') == "band"): ?>
						<td><?php echo $this->Html->link("x",array("action" => "apply",$event["Event"]["id"])); ?></td>
					<?php endif ?>
				</tr>
		<?php endforeach ?>
	</table>
</div>


