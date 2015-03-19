<?php
require_once("readXML.php");
// print_r(dirname(dirname(__FILE__))."/xml/casedata.xml");die();
$xml = "casedata.xml";
$obj = new ReadXML();

$result = $obj->read_case_data($xml,'include_creatives');
print_r(array(false,true,1))

// print_r($result);

?>