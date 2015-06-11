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

	private $dom;

	public function __construct()
	{
		/*$this->filename = $file;*/
		$this->dom = new DOMDocument('1.0', 'UTF-8');
		header("Content-type:text/html;charset=utf-8");
	}

	/**
	 * excecute process of reading xml to array
	 * @param 
	 * @return array
	 */

	public function exec_read_xml($file)
	{
		$xml = "E:/www/xml/".$file;
		$this->dom->load($xml);  
		$root = $this->dom->documentElement;  

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

	public function write_xml()
	{
		$link = new mysqli('localhost', 'root', '', 'cms_development');
		if ($link->connect_errno) {
		    printf("Connect failed: %s\n", $link->connect_error);
		    exit();
		}

		$sql = "select * from advertiser";
		$query = $link->query($sql);
		$rows = array();
		while($row = $query->fetch_array(MYSQL_ASSOC))
		{
		    $rows[] = $row; 
		}
		$link->close();

		$dom = new DOMDocument('1.0', 'UTF-8');
		$dom->formatOutput = true;
		$rootelement = $dom->createElement("Advertiser");
		foreach ($rows as $key=>$value)
		{
			$advertiser = $dom->createElement('advertiser_'.$key, false);
			$name = $dom->createElement("name", $value['name']);
			$sitename = $dom->createElement("sitename", $value['site_name']);
			$siteurl = $dom->createElement("siteurl", $value['site_url']);
			$language = $dom->createElement("language", $value['language']='EN' ? 'English' : 'China');
			$telephone = $dom->createElement("telephone", $value['telephone']);
			$address = $dom->createElement("address", $value['address']);
			$account_id = $dom->createElement("account_id", $value['account_id']);
			$create_time = $dom->createElement("create_time", $value['create_time']);
			$last_modify = $dom->createElement("last_modify", $value['last_modify']);
			$is_del = $dom->createElement("is_del", $value['is_del']);
			$is_whiteuser = $dom->createElement("is_whiteuser", $value['is_whiteuser']);
			$advertiser->appendChild($name);
			$advertiser->appendChild($sitename);
			$advertiser->appendChild($siteurl);
			$advertiser->appendChild($language);
			$advertiser->appendChild($telephone);
			$advertiser->appendChild($address);
			$advertiser->appendChild($account_id);
			$advertiser->appendChild($create_time);
			$advertiser->appendChild($last_modify);
			$advertiser->appendChild($is_del);
			$advertiser->appendChild($is_whiteuser);		
			$rootelement->appendChild($advertiser);
		}
		$dom->appendChild($rootelement);
		$filename = "E:/www/xml/advertiser001.xml";
		echo 'XML文件大小' . $dom->save($filename) . '字节';

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

