
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<div class="tableDisplay concrete gmapHeader">
	<h1>Create a new Hall</h1>
	<?php
		echo $this->Form->create("Hall");
		echo $this->Form->input("name");
		echo $this->Form->input("address",array('id' => 'address'));
		echo $this->Form->end("Create");
		echo $this->Form->input("gmapSearch",array("type" => "button","label" => false,'id' => 'gmapSearch'));
	?>
</div>
<div class="Gmap">
	<?php
		echo $this->googlemap->map();
	?>
</div>
<?php
	echo $this->Html->script('gmap_facto');
	echo $this->Html->script('GmapScript');
?>