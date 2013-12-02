
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<div class="tableDisplay concrete gmapHeader">
	<h1>Create a new Hall</h1>
</div>
<div class="Gmap">
	<?php
		echo $this->googlemap->map();
	?>
</div>
<?php
	echo $this->Html->script('GmapScript');
?>