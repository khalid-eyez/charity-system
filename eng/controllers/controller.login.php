<?php
namespace eng\controllers;
use \eng\obj\{ngo,donor};
session_start();
require_once("../../autoload.php");
if(isset($_GET['username']) && isset($_GET['pass']))
{  
  $pass=$_GET['pass'];
  $username=$_GET['username'];
  $user=new ngo();
  $res=$user->login($pass,$username);
  $pg="";
  $login=false;
  
  if($res==true)
  {
      $login=true;
      $pg="ngo";
      print $pg;
  }
  else
  {
      $user=new donor();
      $res=$user->login($pass,$username);
      if($res==true){$login=true; $pg="donor"; print $pg;
    }
      else
      {
          $login=false;
          print $login;
      }
  }
}
else
{
   header("location:../../ui/index.html");
}







?>