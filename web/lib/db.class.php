<?php
class DB{	//数据库连接类
	private  $dbtype='mysql';	//数据库类型
	private  $host='localhost';	//数据库主机名
	private  $user='root';	//数据库连接用户名
	private  $pwd='root';	//对应的密码
	private  $dbname='book';	//操作的数据库
	private  $con;
	function __construct(){
	    $dsn="{$this->dbtype}:host={$this->host};dbname={$this->dbname}";	//数据来源名称
	    try{
	        $this->con=new PDO($dsn,$this->user,$this->pwd);	//初始化PDO对象
	        $this->con->query("set names utf8");	//设置编码
	    }
	    catch(PDOException $e){
	        die($e->getMessage());
	    }	
	}
	

	public function Exec($sqlstr){
		$sqltype=strtolower(substr(trim($sqlstr),0,6));
		$rs=$this->con->prepare($sqlstr);
		$rs->execute();
		if($sqltype=="select"){
			$array=$rs->fetchAll(PDO::FETCH_ASSOC);
			if(count($array)==0||$rs==false)
				return false;
			else
				return $array;
		}
		else if($sqltype=="insert"||$sqltype=="update"||$sqltype=="delete"){
			if($rs)
				return true;
			else
				return false;
		}
	}

}
?>