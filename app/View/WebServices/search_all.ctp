<?php

	$arrayRes = array();
	$arraySub = array();
	foreach ($bands as $band) {
		array_push($arraySub, array("id"=>$band['Band']['id'],'name'=>$band['Band']['name']));
	}
	$arrayRes['results'] = $arraySub;
	$arrayRes['more'] = false;
	echo json_encode($arrayRes);	
?>