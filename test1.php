<?php

	require_once('classstruct.php');

	$obj = new CreateDB;
	$obj->createconn();
	$obj->getresult();
	$data = array();
	while ($obj->getrow()) 
	{
		$data[] = $obj->getrow();
		
	}
	var_dump($data);
	
	echo json_encode($data);


?>
