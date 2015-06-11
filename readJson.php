<?php

/*$str = file_get_contents('log2.json');

$_str = str_replace('}{','},{',$str);
$json_str = "[".$_str."]";

$result = json_decode($json_str,true);

$temp = array();
$new_arr = array();

foreach($result as $row){
	if (isset($row['status'])) {
		# code...
		if ($row['status'] == 'fail') {
			$temp['test'] = $row['test'];
			$temp['status'] = $row['status'];
			$temp['message'] = $row['message'];

			$new_arr[] = $temp;
		}
	}
	
}

print_r($new_arr);*/


require "PHPExcel.php";
require "ReadJsonClass.php";

$file = 'log_test.json';

$obj = new ReadJsonClass();

$obj->export_execl($file);
