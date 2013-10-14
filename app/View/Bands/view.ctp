
<?php if($editable) : ?>
	<div class="submenu">
		<li>
			<?php  
				echo $this->Html->link(
				    $this->Html->image("edit.png", array("alt" => "Edit")),
				    array("action"=>"edit"),
				    array('escape' => false)
				);
			?>
		</li>
	</div>
<?php endif ?>
<div class='textDisplay'>
	<h1><?php echo $band['Band']['name'] ?></h1>
	<p>Creation : <?php echo $band['User']['created'] ?></p>
	<p>Country : <?php echo $band['Country']['id'] == null ? "undefined" : $band['Country']['label_en']; ?>
	<p><?php echo var_dump($band) ?></p>
</div>
<div class='rightDisplay'>
	<div class="tableDisplay">
		<h2>Songs<h2>
	</div>
	<div class="tableDisplay">
		<h2>Activities</h2>
	</div>
</div>