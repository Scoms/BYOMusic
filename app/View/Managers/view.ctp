<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<?php if($editable){
	echo $this->element('submenu_manager');
}
?>
<style type="text/css">
	div#map_canvas{
		height: 200px;
		width: 400px;
	}
	h2{
		margin-top:50px;
	}
</style>

<div class="textDisplay">
	<h1><?php echo $manager['Manager']['name'] ?></h1>
</div>

<div class="rightDisplay">
	<div class="tableDisplay">
		<h1>Halls</h1>

		<table>
			<tr>
				<th>Name</th>
				<th>Address</th>
			</tr>
			<?php foreach ($halls as $hall) : ?>
				<tr>
					<td><?php echo $hall['Hall']['name'] ?></td>
					<td class="hallAddress" id=<?php echo $hall['Hall']['name']?>
						>
						<?php echo $hall['Hall']['address'] ?></td>
				</tr>
			<?php endforeach ?>
		</table>
		<div id="gmapContainer">
			<h2></h2>
			<?php
				echo $this->googlemap->map();
				echo $this->Html->script('gmap_facto');
				echo $this->Html->script('gmapscript_halls');
			?>
		</div>
	</div>
</div>
