<?php

	$arrayRes = array();
	$arraySub = array();
	foreach ($countries as $country) {
		array_push($arraySub, array("id"=>$country['Country']['id'],'label_en'=>$country['Country']['label_en']));
	}
	$arrayRes['results'] = $arraySub;
	$arrayRes['more'] = false;
	echo json_encode($arrayRes);	
?>