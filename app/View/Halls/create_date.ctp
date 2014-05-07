<div class="textDisplay">
	<h1>
		Create date.
	</h1>
	<?php
		echo $this->Form->create("Event",array('url' => array('controller' => 'halls', 'action' => 'createDate')));
		echo $this->Form->input("hall_id",array("type" => "select"));
		echo $this->Form->input("label");
		echo $this->Form->input("description");
		echo $this->Form->input("date",array("id"=>"datepicker"));
		echo $this->Form->end("Create");
	?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#datepicker").datepicker();
	})
</script>
