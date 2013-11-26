<?php if($editable) : ?>
	<div id='sub' class="submenu">
		<ul>
			<li>
				<?php  
					echo $this->Html->link(
					    $this->Html->image("edit.png", array("alt" => "Edit")),
					    array("action"=>"edit",$id),
					    array('escape' => false)
					);
				?>
			</li>
		</ul>
	</div>
<?php endif ?>

<div class="textDisplay">
	<h1><?php echo $manager['Manager']['name'] ?></h1>
</div>
