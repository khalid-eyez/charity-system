<?php
namespace eng\controllers;
use \eng\obj\{ngo,donor};
require_once("../../autoload.php");
if(isset($_GET['username']) && isset($_GET['pass']) && isset($_GET['name']) && isset($_GET['user']))
{  
  $pass=$_GET['pass'];
  $username=$_GET['username'];
  $name=$_GET['name'];

  $data=[];

  $user=null;
  if($_GET['user']=="ngo")
  {
   $data["ngo_name"]=$name;
   $data["ngo_phone"]="";
   $data["ngo_email"]=$username;
   $data["ngo_pwd"]=password_hash($pass, PASSWORD_DEFAULT);
   $data["ngo_country"]="";
   $data["ngo_city"]="";
   $data["ngo_img"]="ngo.jpg";
   $data["ngo_status"]="";
   $user=new ngo();
  }
  else if($_GET['user']=="donor")
  {
   $user=new donor();
   $data["donor_fname"]=$name;
   $data["donor_lname"]="";
   $data["donor_email"]=$username;
   $data["donor_pwd"]=password_hash($pass, PASSWORD_DEFAULT);
   $data["donor_country"]="";
   $data["donor_city"]="";
   $data["donor_img"]="user.png";
  }
  else{
     print "unknown user";
  }
  $res=$user->createAccount($data);

  if($res==true)
  {
     print "yes";
  }
  else
  {
   print "no";
}

}



?>