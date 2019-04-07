<?php
	require("db_config.php");
	class Interfaces{
			public function login($user,$pwd){
				$db=new DataBase();
				$sql="select * from user where name='$user' and password = '$pwd'";
				$res=$db->ExecSQL($sql);
				if($res==true){
					$_SESSION['username']=$user;
					$_SESSION['password']=$pwd;
					$result['code']=0;
					$result['msg']="login successfully";
				}
				else{
					$result['code']=1;
					$result['msg']="login fail";
				}
				return $result;
			}
			//....
			//....
			//public function add(){}
			//....
	}

?>