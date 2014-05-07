<div class="titleDisplay">
	<h1><?php echo $event['Event']['label'] ?></h1>
</div>
<div class="rightDisplay">
		<h1>Bands interested</h1>

	<table>
		<tr class="header">
			<th>Name</th>
			<th>Response</th>
		</tr>
		<?php foreach ($event['Band'] as $band): ?>
		<tr>	
			<td>
				<?php echo $this->Html->link($band['name'],array('controller' => 'bands', 'action' => 'view',$band['id'])) ?>
			</td>
			<td>
				<?php 
					//echo "ok"; $band['BandsEvent']["confirmed"]
					$zboub = "0";	
					switch ($band['BandsEvent']["confirmed"]) {
						case 'Waiting':
							$zboub = "0";	
							break;
						case 'Accepted':
							$zboub = "1";	
							break;
						case 'Denied':
							$zboub = "2";	
							
							break;
					}
					echo $this->Form->input('',array('type' => 'select', 'options' => $responses,'default' => $zboub ,'id'=>$eventId."/".$band['id']."/" ,'class' => 'selectResponse'));
				?></td>
		</tr>
		<?php endforeach ?>
	</table>
	<?php //echo var_dump($event['Band']['BandsEvent']["confirmed"]	) ?>
</div>

<script type="text/javascript">
	
$(document).ready(function(){
	$(".selectResponse").change(function(e){
		var url = "../confirmBand/" + e.target.id + e.target.options[e.target.selectedIndex].value;
		alert(url);
		$.ajax({
				url: url,
			}).done(function() {
				alert( "done" );
			});
});
})

</script>