<?php

namespace eng\controllers;
use \eng\obj\{ngo,main};
require_once("../../autoload.php");
session_start();
//ngo name
if(isset($_GET['request']))
{
    switch($_GET['request'])
    {
      case "allrequests":
      
      $main=new main();
      $all=$main->viewAll();
      
     
        print json_encode($all);
     
        break;
      

      
    }
}

  

?>