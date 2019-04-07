<?php
session_start();
require("interface.php");
define("LOGIN",'login');



$type=$_REQUEST['type'];

switch($type){
	case LOGIN:
		$user=$_REQUEST['user'];
		$pwd=$_REQUEST['pwd'];
		$iface=new Interfaces();
		$res=$iface->login($user,$pwd);
		echo json_encode($res,JSON_UNESCAPED_UNICODE);
		break;
	//case XXX:
	//...
	//case YYY:s
}


?>