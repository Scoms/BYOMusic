<div class="bubbles">
	<div class="by2">
		<h1>Add Songs</h1>
			<?php
				echo $this->Form->create('Song',array('type'=>'file'));
				echo $this->Form->input('path',array('type'=>'file'));
				echo $this->Form->end('Upload');
			?>
		<h1>Create an Album</h1>
			<?php
				echo $this->Form->create('Album',array(
   						 'url' => array('controller' => 'albums', 'action' => 'add')));
				echo $this->Form->input('title');
				echo $this->Form->input('band_id',array('value'=>AuthComponent::user('id'),'type'=>'hidden'));
				echo $this->Form->end('Create');
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
   						 'url' => array('controller' => 'songs', 'action' => 'edit',AuthComponent::user('id'))));
   						 ?>
						<td>
							<?php
   							echo $this->Form->input('id',array('value'=>$song['Song']['id']));
   							echo $this->Form->input('path',array('value'=>$song['Song']['path'],'type'=>'hidden'));
							echo $this->Form->input('title',array('label'=>false,'value'=>is_null($song['Song']['title']) ? $song['Song']['path'] : $song['Song']['title'])); 
							?>
						</td>
						<td><?php echo $this->Form->input('album',array('type'=>'select','label'=>false)) ?></td>
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