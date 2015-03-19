<?php
Class CreateDB
{
	var $db = 'localhost';
	var $dbusername = 'root';
	var $dbpwd = '1234';
	var $dbtable = 'bilin_cms';
	var $conn;
	var $result;
	var $mysql = "select * from account";
	var $row;
	function __consturct()
	{
		error_reporting(E_ALL ^ E_DEPRECATED);
	} 
	public function createconn() //这个类方法是开始一个conn连接,然后开始选择数据库 
	{
		$this->conn = mysql_connect($this->db, $this->dbusername, $this->dbpwd);
		mysql_select_db($this->dbtable, $this->conn);
	}

	public function getresult()  //得到结果集
	{
		$this->result = mysql_query($this->mysql, $this->conn);
	}

	public function getrow() //创建一个向前的指针
	{
		$this->row = mysql_fetch_array($this->result);
		return $this->row;
	}

}


