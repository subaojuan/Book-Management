<?php

require("db.class.php");
class Interfaces{
    
    //创建一个登陆的方法
    public function login($username,$pwd){       
        $sql ="SELECT * FROM admin where username='$username' and password='$pwd'";
        $db=new DB();
        $res=$db->Exec($sql);
        if(($res)==true)
        {
            $_SESSION["pwd"]=$pwd;
            $_SESSION["username"]=$username;
            //$_SESSION["admin"]=session_id();

            $result['flag']=true;
            $result['msg']='登陆成功';
            return $result;
        }
        else
        {
            $result['flag']=false;
            $result['msg']='登陆失败,请重新登陆';
            return $result;
        }
    }

    
    //获取右侧服务器相关的信息
    public function getServer(){
        $result=array();
        $result['vesion']=PHP_VERSION;
        $result['sname']=$_SERVER['SERVER_NAME'];
        $result['sip']=$_SERVER["HTTP_HOST"];
        $result['sport']=$_SERVER["SERVER_PORT"];
        $result['stime']=date("Y-m-d H:i:s");
        $result['soc']=PHP_OS;
        $result['surl']=$_SERVER["DOCUMENT_ROOT"];
       return $result; 
    }
    
    //修改密码
    public function changepwd($pwd,$pwd1){
        $sql ="update admin set password='{$pwd1}' where password='{$pwd}'";
        $db=new DB();
        $res=$db->Exec($sql);
        if(($res)==true)
        {
          
            $result['flag']=true;
            $result['msg']='密码成功，返回重新登陆';
            return $result;
        }
        else
        {
            $result['flag']=false;
            $result['msg']='密码失败,请重新修改';
            return $result;
        }
        
    }

    //修改图书信息
    public function updates($id,$name,$price,$time,$type,$total){
      $sql = "update yx_books set name='{$name}',price='{$price}',uploadtime='{$time}',type='{$type}',total='{$total}' where id={$id}";
      $db=new DB();
      $res=$db->Exec($sql);
      if($res==true){
        $result['flag']=true;
        $result['msg']="修改成功";
      }
      else{
        $result['flag']=false;
        $result['msg']="修改失败";
      }
      return $result;
    }


    //查询所有的图书
    public function selects(){
        $sql = "select * from yx_books";
        $db=new DB();
        $res=$db->Exec($sql);
        if($res){
            $result['flag']=true;
            $result['msg']=$res;
            return $result;
        }else{
            $result['flag']=false;
            $result['msg']='查询失败';
            return $res;
        }
        
    }
    
    //删除图书
    public function dels($id){
        $sql="DELETE FROM yx_books where id='{$id}'";
        $db=new DB();
        $res=$db->Exec($sql);
        if($res){
            $result['flag']=true;
            $result['msg']='删除成功';
            return $result;
        }else{
            $result['flag']=false;
            $result['msg']='删除失败';
            return $result;
        }
               
    }
    
   //添加图书
   public function adds($name,$price,$uptime,$type,$total){
       $sql = "INSERT INTO yx_books (name,price,uploadtime,type,total)
		values('{$name}','{$price}','{$uptime}','{$type}','{$total}')";
       $db=new DB();
        $res=$db->Exec($sql);
        if($res){
            $result['flag']=true;
            $result['msg']='图书添加成功';
            return $result;
        }else{
            $result['flag']=false;
            $result['msg']='图书添加失败';
            return $result;
        } 
   }
   
   //图书按条件查询
   public function selectWhere($wheres,$con){
       
       $str="";
       if(!empty($wheres)){
           $str.=" and {$wheres}='{$con}'";
       }
       $sql = "select * from yx_books where 1 {$str}";
       
       $db=new DB();
       $res=$db->Exec($sql);
       if($res){
           $result['flag']=true;
           $result['msg']=$res;
           return $result;
       }else{
           $result['flag']=false;
           $result['msg']='查询失败'; 
           return $result;
       }
   }
   //图书统计
   
   public function counts(){
       $sql="select type, count(*) num from yx_books group by type";
       $db=new DB();
       $res=$db->Exec($sql);
       if($res){
           $result['flag']=true;
           $result['msg']=$res;
           return $result;
       }else{
           $result['flag']=false;
           $result['msg']='查询失败';
           return $result;
       }
   }
   
    
    
}