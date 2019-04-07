<?php
session_start();
//require("verify.php");
require("Interfaces.class.php");
define("LOGIN",'login');
define("RIGHT",'right');
define("CHANGEPWD",'changepwd');
define("LISTS",'lists');
define("DELS",'dels');
define("ADDS",'adds');
define("SELECTWHERE",'selectwhere');
define("COUNTS",'counts');
define("VERIFY",'verify');
define("UPDATES",'updates');
$type=$_REQUEST['type'];

switch ($type){
    case VERIFY:
        require("verify.php");
        $_SESSION['auth']=$authnum;
        break;
    case LOGIN:
        $username=$_REQUEST['username'];
        $pwd=$_REQUEST['pwd'];
        $code=$_REQUEST['code'];
        if($code !=$_SESSION['auth']){
            $res['flag']=false;
            $res['msg']="验证码不正确";
        }else{
            $iface=new Interfaces();
            $res=$iface->login($username,$pwd);
        }
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
        
    break; 

    case RIGHT:
        $iface=new Interfaces();
        $res=$iface->getServer();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
        break;
    case  CHANGEPWD:
        $pwd=$_REQUEST['password'];
        $pwd1=$_REQUEST['password1'];
        $iface=new Interfaces();
        $res=$iface->changepwd($pwd,$pwd1);
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
        break;
    case  LISTS:
        $iface=new Interfaces();
        $page=$_REQUEST['page'];
        $count=$_REQUEST['count'];
        $res=$iface->selects();
        $booksum=count($res['msg']);    //图书的总数
        $pagesum=ceil($booksum/$count);  //向上舍入为最接近的整数 总页数
        $start=($page-1)*$count;
        $res['msg']=array_slice($res['msg'],$start,$count,true);
        $res['booksum']=$booksum;
        $res['pagesum']=$pagesum;
        $res['page']=$page;
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
        break;
    case  DELS:
        $id=$_REQUEST['id'];
        $iface=new Interfaces();
        $res=$iface->dels($id);
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
        break;        
    case  ADDS:
            $name=$_REQUEST['name'];
            $price=$_REQUEST['price'];
            $types=$_REQUEST['types'];
            $total=$_REQUEST['total'];
            $uptime=$_REQUEST['uptime'];
            $iface=new Interfaces();
            $res=$iface->adds($name,$price,$uptime,$types,$total);
            echo json_encode($res,JSON_UNESCAPED_UNICODE);
            break;
    case  SELECTWHERE:
                $type=$_REQUEST['wheres'];
                $coun=$_REQUEST['coun'];
                $iface=new Interfaces();
                $res=$iface->selectWhere($type,$coun);
                echo json_encode($res,JSON_UNESCAPED_UNICODE);
                break;
    case  COUNTS:
                    $iface=new Interfaces();
                    $res=$iface->counts();
                    echo json_encode($res,JSON_UNESCAPED_UNICODE);
                    break;   
    case UPDATES:
            $id=$_REQUEST['id'];
            $name=$_REQUEST['name'];     
            $price=$_REQUEST['price'];
            $uptime=$_REQUEST['uptime'];
            $type=$_REQUEST['btype'];
            $total=$_REQUEST['total']; 
            $iface=new Interfaces();
            $res=$iface->updates($id,$name,$price,$uptime,$type,$total);
            echo json_encode($res,JSON_UNESCAPED_UNICODE);
            break; 

}

