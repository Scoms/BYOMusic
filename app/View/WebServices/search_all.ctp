<?php
	$arrayRes = array();
	$arraySub = array();
	foreach ($bands as $band) {
		array_push($arraySub, array("id"=>'bands/view/'.$band['Band']['user_id'],'name'=>$band['Band']['name']));
	}
	foreach ($managers as $manager) {
		array_push($arraySub, array("id"=>'managers/view/'.$manager['Manager']['user_id'],'name'=>$manager['Manager']['name']));
	}
	$arrayRes['results'] = $arraySub;
	$arrayRes['more'] = false;
	echo json_encode($arrayRes);	
?>