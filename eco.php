<?php

require_once(dirname(__FILE__)."/test.php");

$Model = array(
        'cost_model'=> 'CPC',
        'cost_value' => 1.2
        );

$report = array(
        'clicks' => 10
        );


$new = new Report_Cost_Model();

$result = $new->costCallback( $Model, $report );
echo $result;