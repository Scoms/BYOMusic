<?php echo $this->element('submenu_band'); ?>

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
				echo $this->Form->input('title',array('placeholder' => 'choose a title ...'));
				echo $this->Form->input('band_id',array('value'=>AuthComponent::user('id'),'type'=>'hidden'));
				echo $this->Form->end('Create');
			?>
	</div>
	<div class="by2">
		<h1>Sort</h1>
			<?php foreach ($songs as $song): ?>
				<?php 
					if(is_null($song['Song']['album_id'])){
						echo $this->Form->create('Song',array('url' => array('controller' => 'songs', 'action' => 'edit',AuthComponent::user('id'))));
						echo $this->Form->input('id',array('value'=>$song['Song']['id']));
						echo $this->Form->input('path',array('value'=>$song['Song']['path'],'type'=>'hidden'));
						echo $this->Form->input('title',array('label'=>false,'value'=>is_null($song['Song']['title']) ? $song['Song']['path'] : $song['Song']['title'])); 
						echo $this->Form->input('album_id',array('type'=>'select','label'=>false,
				  'empty' => 'choose'));
						echo $this->Form->end('Edit');
						echo $this->Html->link('x',array('controller'=>'songs','action'=>'remove',AuthComponent::user('id') ,$song['Song']['id']),array(),"Are you sure you wish to delete this awesome song ?"); 
					}
				?>
			<?php endforeach ?>
			
			<?php foreach ($albums_for as $album): ?>
				<table>
					<caption><?php echo $album['Album']['title'] ?></caption>
					<tr>
						<th>Title</th>
						<th>Album</th>
						<th>Edit</th>
						<th>Remove</th>
					</tr>
					<?php foreach ($songs as $song) :?>
						<?php if($song['Song']['album_id'] == $album['Album']['id']): ?>
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
								<td><?php echo $this->Form->input('album_id',array('type'=>'select','label'=>false,
			  'empty' => 'choose')) ?></td>
								<td>
								<?php echo $this->Form->end('Edit') ?>	
								</td>
								<td><?php echo $this->Html->link('x',array('controller'=>'songs','action'=>'remove',AuthComponent::user('id') ,$song['Song']['id']),array(),
			"Are you sure you wish to delete this awesome song ?") ?></td>
							</tr>
						<?php endif ?>
					<?php endforeach ?>
				</table>
			<?php endforeach ?>
	</div>

</div>