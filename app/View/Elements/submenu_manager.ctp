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
		<li>
			<?php  
				echo $this->Html->link(
				    $this->Html->image("edit.png", array("alt" => "Edit")),
				    array('controller'=>'Halls',"action"=>"create",$id),
				    array('escape' => false)
				);
			?>
		</li>
			<?php  
				echo $this->Html->link(
				    $this->Html->image("date.png", array("alt" => "Déposer une annonce")),
				    array('controller'=>'Halls',"action"=>"createDate"),
				    array('escape' => false)
				);
			?>
		<li>
		</li>
	</ul>
</div>