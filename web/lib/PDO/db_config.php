<?php
class DataBase{//数据库类
	private $dbtype="mysql";//数据库类型
	private $host="localhost";//数据库主机名
	private $user="root";//数据库连接用户名
	private $pwd="root";//密码
	private $dbname="    ";//操作的数据库
	private $conn;//数据库连接对象

	/*构造函数*/
	function __construct(){
		$dsn="{$this->dbtype}:host={$this->host};dbname={$this->dbname}";
		try{
			$this->conn=new PDO($dsn,$this->user,$this->pwd);
			$this->conn->query("set names utf8");
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}


	/*数据库操作函数*/
	public function ExecSQL($sqlstr){
		$sqltypr=strtolower(substr(trim($sqlstr),0,6));
		$res=$this->conn->prepare($sqlstr);
		$res->execute();
		if($sqltype="select"){
			$array=$res->fetchAll(PDO::FETCH_ASSOC);
			if(count($array)==0||$res=false)
				return false;
			else
				return $array;
		}
		else if($sqltype="insert"||$sqltype=="update"||$sqltype=="delete"){
			if($rs)
				return true;
			else
				return false;
		}
	}

}
?>