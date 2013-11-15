<div class="textDisplay">

	<h1>Edit</h1>
	<?php echo $this->Form->create('Band'); ?>	
    <p><?php echo $this->Form->input('id',array('value'=> $band['Band']['id'],'type'=>'hidden')) ?></p>
	<P><?php echo $this->Form->input('name',array('value' => $band['Band']['name'])) ?></p>
	<P><?php echo $this->Form->input('User.created',array('value' => $band['User']['created'],'type'=>'text')) ?></p>
	<P><?php echo $this->Form->input('User.id',array('value' => $band['User']['id'],'type' => 'hidden')) ?></p>
	<P>
		<?php echo $this->Form->input('User.Country',array(
		'label'=>'',
        'style' => 'width:200px'
		)); ?>
        <?php echo $this->Form->input('User.Country.id',array('value'=>$band['User']['Country']['id'],'type'=>'hidden')) ?>
		<?php echo $this->Form->input('oldCountry',array('value'=>$band['User']['Country']['label_en'],'type'=>'hidden')) ?>
	</p>
    <p><?php echo $this->Form->input('Style',array(
            'label' => __('Styles :',true),
            'type' => 'select',
            'multiple' => 'checkbox',
            'options' => $styles,
            'selected' => $styles_selected
        )) ?>
    </p>
	<?php echo $this->Form->end('Update'); ?>	
</div>

<script type="text/javascript">

$(document).ready(function(){
    //Date
    $('#UserCreated').datepicker({
        dateFormat: 'yy-mm-dd'
        });
    $("#UserCreated").keypress(function(event) {event.preventDefault();});
    //Country
	var oldCountry = $('#BandOldCountry').val();
	$('#UserCountry').select2({
    minimumInputLength: 2,
    placeholder: oldCountry,
    ajax: {
        url: "/BYOMusic/Countries/webService/"+$('#UserCountryLabelEn').val(),
        dataType: 'json',
        data: function(term, page) {
            return {
                pSearch: term,
            };
        },
        results: function(data, page) {
            return {
                results: data.results
            };
        },
        initSelection: function (element, callback) {
                              var data = { id: "ok", text: "ok" };
                            callback(data);
                        }
    },
    formatResult: formatResult,
    formatSelection: formatSelection,
	});
});

function formatResult(node) {
    return '<div>' + node.label_en + '</div>';
};

function formatSelection(node) {
	$('#UserCountryId').val(node.id);
	$('#UserCountryLabelEn').val(node.label_en);
    return node.label_en;
};

</script>