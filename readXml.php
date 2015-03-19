<?php

/**
 * 
 *	Read XML file to array
 *	function exc_read_xml 
 *	@package 
 *	@subpackage 
 *	@author Hao Mengru 2015/3/11
 *
 */
class ReadXML 
{

	// public $filename;

	/**
	 * initalize the attribute of ReadXML class
	 * @param filename
	 * @return 
	 */
	public function __construct(  ){
		/*$this->filename = $file;*/
	}

	/**
	 * excecute process of reading xml to array
	 * @param 
	 * @return array
	 */

	public function exec_read_xml($file)
	{
		$xml = dirname(dirname(__FILE__))."/xml/".$file;
		$dom = new DOMDocument(); 
		$dom->load($xml);  
		$root = $dom->documentElement;  

		$arr=array();  
		foreach ($root->childNodes as $item)  {    
			if($item->hasChildNodes()) {    
				$tmp1=array();   
				$temp2= array(); 
				foreach($item->childNodes as $one) {    

				  if(!empty($one->tagName)){
				  		foreach ($one->childNodes as $two) {
				  		       if (!empty($two->tagName)) {
				  		       		$temp2[$two->tagName] = $two->nodeValue;
				  		       }
				  		}       
						$tmp1[$one->tagName]=$temp2;   
					}    
				}      
				$arr[$item->tagName]=$tmp1;      
			}  
		}  
		return $arr;
	}

	public function read_case_data($file, $func_name)
	{
		$data = $this->exec_read_xml($file);
		$new_arr = array();
		$temp = array();
		foreach ($data as $key => $value) {
			if ($key == $func_name) {
				$new_arr = $value;
			}
		}

		foreach ($new_arr as $row) {
			$temp[] = array_values($row);
		}
		return $temp;
	}
}

?>

