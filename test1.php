<?php

	/*require_once('classstruct.php');

	$obj = new CreateDB;
	$obj->createconn();
	$obj->getresult();
	$data = array();
	while ($obj->getrow()) 
	{
		$data[] = $obj->getrow();
		
	}
	var_dump($data);
	
	echo json_encode($data);*/

/*	require_once('readXML.php');

	$obj = new ReadXML;

	$data = $obj->exec_read_xml('casedata.XML');

	print_r($data);*/


	//将数组输出到XML文件中
	// by MoreWindows( http://blog.csdn.net/MoreWindows )
	header("Content-type:text/html;charset=utf-8");

	$link = new mysqli('localhost', 'root', '', 'cms_development');
	if ($link->connect_errno) {
	    printf("Connect failed: %s\n", $link->connect_error);
	    exit();
	}

	$sql = "select * from advertiser";
	$query = $link->query($sql);

	// $result = $query->fetch_array();
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
		$dom->formatOutput = true;
	}
	$dom->appendChild($rootelement);
	$filename = "E:/www/xml/advertiser001.xml";
	echo 'XML文件大小' . $dom->save($filename) . '字节';



	/*$article_array = array(  
    "第一篇" => array(  
        "title"=>"PHP访问MySql数据库 初级篇",   
        "link"=>"http://blog.csdn.net/morewindows/article/details/7102362"  
    ),  
    "第二篇" => array(  
        "title"=>"PHP访问MySql数据库 中级篇 Smarty技术",   
        "link"=>"http://blog.csdn.net/morewindows/article/details/7094642"  
    ),  
    "第三篇" => array(  
        "title"=>"PHP访问MySql数据库 高级篇 AJAX技术",   
        "link"=>"http://blog.csdn.net/morewindows/article/details/7086524"  
    ),  
);  
$dom = new DOMDocument('1.0', 'UTF-8');  
$dom->formatOutput = true;  
$rootelement = $dom->createElement("MoreWindows");  
foreach ($article_array as $key=>$value)  
{  
    $article = $dom->createElement("article", $key);  
    $title = $dom->createElement("title", $value['title']);  
    $link = $dom->createElement("link", $value['link']);  
    $article->appendChild($title);  
    $article->appendChild($link);  
    $rootelement->appendChild($article);  
}  
$dom->appendChild($rootelement);  
$filename = "E:/www/xml/test0001.xml";  
echo 'XML文件大小' . $dom->save($filename) . '字节';  */
?>
