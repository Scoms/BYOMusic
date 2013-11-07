<div class="bubbles">
	<div class="by3">
		<h1>Add </h1>
			<?php
				echo $this->Form->create('Song',array('type'=>'file'));
				echo $this->Form->input('path',array('type'=>'file'));
				echo $this->Form->end('Upload');
			?>
	</div>
	<div class="by3">
		<h1>Sort</h1>

			<?php if(!is_null($songs_no_album)): ?>
				<table>
					<tr>
						<th>Title</th>
					</tr>
				<?php foreach ($songs_no_album as $song) :?>
					<tr>
						<td><?php echo is_null($song['Song']['title']) ? $song['Song']['path'] : $song['Song']['title'] ?></td>
					</tr>
				<?php endforeach ?>
				</table>
			<?php endif ?>
	</div>
	<div class="by3">
		<h1>Remove</h1>
			<?php
				echo $this->Form->create('Song',array('type'=>'file'));
				echo $this->Form->input('path',array('type'=>'file'));
				echo $this->Form->end('Upload');
			?>
	</div>
</div>