<div class="textDisplay">
	<h1>Add songs</h1>
		<?php
			echo $this->Form->create('Song',array('type'=>'file'));
			echo $this->Form->input('path',array('type'=>'file'));
			echo $this->Form->end('Upload');
		?>
</div>