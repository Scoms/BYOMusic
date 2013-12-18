
<?php if($editable){
	echo $this->element('submenu_band');
}
?>

<div class='textDisplay'>
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
	<p>Contact : <?php echo $band['Band'] ?></p>
</div>
<div class='rightDisplay'>
	<div class="tableDisplay">
		<h2>Songs</h2>
		<?php foreach ($songs as $song): ?>
			<object type="application/x-shockwave-flash" data="http://localhost/BYOMusic/app/webroot/dewplayer/dewplayer.swf" width="240" height="20" id="dewplayer" name="dewplayer"> 
				<param name="wmode" value="transparent" />
				<param name="movie" value="dewplayer-rect.swf" />
				
			<?php echo '<param name="flashvars" value="mp3=http://localhost/BYOMusic/app/webroot/files/songs/'.$id.DS.$song['Song']['path'].'&amp;randomplay=1" />'
			?>
			</object>
		<?php endforeach ?>
	</div>
	<div class="tableDisplay">
		<h2>Activities</h2>
	</div>
</div>