	<div class="submenu">
		<li>
			<?php  
				echo $this->Html->link(
				    $this->Html->image("edit.png", array("alt" => "Brownies")),
				    array("action"=>"edit",$id),
				    array('escape' => false)
				);
			?>
		</li>
	</div>

<div class='textDisplay'>
	<?php if($editable) : ?>
<?php endif ?>
	<h1><?php echo $band['Band']['name'] ?></h1>
</div>
<div class='rightDisplay'>
	<div class="tableDisplay">
		<h2>Songs<h2>
	</div>
	<div class="tableDisplay">
		<h2>Activities</h2>
	</div>
</div>