
<?php 
	if($editable){
	echo $this->element('submenu_band');
}
?>

<div class='titleDisplay'>
	<h1><?php echo $band['Band']['name'] ?></h1>
	<p>Creation : <?php echo $band['User']['created'] ?></p>
	<p>Country : <?php echo $band['User']['Country'] == null ? "undefined" : $band['User']['Country']['label_en']; ?></p>
	<p>Styles :
		<ul> 
			<?php foreach ($band['Style'] as $style):?>
				<li title=<?php echo '"'.$style["description"].'"' ?> ><?php echo $style['label'] ?></li>
			<?php endforeach ?>
		</ul>
	</p>
	<p>Contact : <?php echo $band['User']['email'] ?></p>
</div>
<div class='rightDisplay'>
	<div class="tableDisplay left">
		<h2>Songs</h2>
		<?php foreach ($songs as $song): ?>
			<object type="application/x-shockwave-flash" data="http://localhost:8888/BYOMusic/app/webroot/dewplayer/dewplayer.swf" width="240" height="20" id="dewplayer" name="dewplayer"> 
				<param name="wmode" value="transparent" />
				<param name="movie" value="dewplayer-rect.swf" />
				
			<?php echo '<param name="flashvars" value="mp3=http://localhost:8888/BYOMusic/app/webroot/files/songs/'.$id.DS.$song['Song']['path'].'&amp;randomplay=1" />'
			?>
			</object>
		<?php endforeach ?>
	</div>
	<div class="tableDisplay">
		<h2>Activities</h2>

		<div class="rightDisplay">
				<div class="tableDisplay right">
					<table>
						<tr>
							<th>Date</th>
							<th>Label</th>
							<th>Status</th>
							<?php if(AuthComponent::user('role') == "band"): ?>
								<th>Unapply</th>
							<?php endif ?>
						</tr>
						<?php foreach ($band['Events'] as $event): ?>
						<tr>
							<td><?php echo $event["date"] ?></td>
							<td><?php echo $event["label"] ?></td>
							<td><?php echo $event["BandsEvent"]["confirmed"] ?></td>
							<?php if(AuthComponent::user('role') == "band"): ?>
								<td><?php echo $this->Html->link("x",array("action" => "unapply",$event["id"])); ?></td>
							<?php endif ?>
						</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
</div>