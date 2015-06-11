<?php 
class Report_Cost_Model
{

   

    public function __construct()
    {

    }

    public function costCallback( $Model, $report )
    {
        return  call_user_func(array($this, 'cost_'.$Model['cost_model']), $Model, $report); 
    }

    public function cost_CPC( $Model, $report)
    {
        return $report['clicks']*$Model['cost_value'];
    }

    public function cost_CPM( $Model, $report )
    {
        return $report['impressions']*$Model['cost_value']/1000.0;
    }
    public function cost_CPA( $Model, $report )
    {
        return $report['conversions']*$Model['cost_value'];

    }
    public function cost_DCPM( $Model, $report )
    {
        return $report['media_costs']*$Model['cost_value'];
    }
}
   
?>