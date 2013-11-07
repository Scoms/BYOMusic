<div class="bubbles">
	<div class="by2">
		<h1>Add </h1>
			<?php
				echo $this->Form->create('Song',array('type'=>'file'));
				echo $this->Form->input('path',array('type'=>'file'));
				echo $this->Form->end('Upload');
			?>
	</div>
	<div class="by2">
		<h1>Sort</h1>

			<?php if(!is_null($songs_no_album)): ?>
				<table>
					<caption>Uknown Album</caption>
					<tr>
						<th>Title</th>
						<th>Album</th>
						<th>Edit</th>
						<th>Remove</th>
					</tr>
				<?php foreach ($songs_no_album as $song) :?>
					<tr>
						<?php echo $this->Form->create('Song',array(
   						 'url' => array('controller' => 'songs', 'action' => 'edit'))) ?>
						<td>
							<?php echo $this->Form->input('title',array('label'=>false,'value'=>is_null($song['Song']['title']) ? $song['Song']['path'] : $song['Song']['title'])) ?>
						</td>
						<td>Album</td>
						<td>
						<?php echo $this->Form->end('Edit') ?>	
						</td>
						<td><?php echo $this->Html->link('x',array('controller'=>'songs','action'=>'remove',AuthComponent::user('id') ,$song['Song']['id']),array(),
    "Are you sure you wish to delete this awesome song ?") ?></td>
					</tr>
				<?php endforeach ?>
				</table>
			<?php endif ?>
	</div>

</div>