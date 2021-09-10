<?php

namespace eng\controllers;
use \eng\obj\{ngo};
require_once("../../autoload.php");
session_start();
//ngo name
$ngo=$_SESSION['ngo'];

if(isset($_GET['request']))
{

    switch($_GET['request'])
    {
      case "name":
        if($ngo->get_status()=="verified")
        {
        print $ngo->get_name().'<i class="fa fa-check-circle" style="font-size:20px;color:blue"></i>';
        }
        else{
          print $ngo->get_name();
        }
        break;
      

      case "img":
        if($ngo->get_img()!="")
        {
        print $ngo->get_img();
        }
        else{
            print "ngo.jpg";
        }
        break;

        case "logout":
            session_destroy();
            session_unset();

            print "done";
            break;
        case "loggedin":
            
                if(!isset($_SESSION['ngo'])){print "false";}
                else{print "true";}
            break;
     

             //all requests

             case "allreq":
              $obj2=new ngo($ngo->get_id());
              $print=$obj2->viewRequests();
              print $print;
              break;

              //ngo basic information

              case "allinfo":
                $obj3=new ngo($ngo->get_id());

                print $obj3->viewInfo();
              

                break;

                case "updateinfo":
                
                $name=$_GET['name'];
                $country=$_GET['country'];
                $city=$_GET['city'];
                $email=$_GET['email'];
                $phone=$_GET['phone'];
                
                $update_ngo=new ngo($ngo->get_id());
                $update_ngo_mod=$update_ngo->get_data();
                if($update_ngo_mod->update('NGO_name',$name) && $update_ngo_mod->update('NGO_country',$country) && $update_ngo_mod->update('NGO_city',$city) && $update_ngo_mod->update('NGO_email',$email) && $update_ngo_mod->update('NGO_phoneno',$phone))
                {
                  $ngo->set_name($name);
                  $ngo->set_phone($phone);
                  $ngo->set_email($email);
                  $ngo->set_country($country);
                  $ngo->set_city($city);

                  $_SESSION['ngo']=$ngo;

                  print "done";

                }
                else{
                  print "not done";
                }
                break;

               case "alluploads":
               
                $uploads_ngo=new ngo($ngo->get_id());
                $uploads_ngo->viewuploads();

               break;
               case "deletefile":
                $deleting_ngo=new ngo($ngo->get_id());
                $deleting_ngo->delete_file(intval($_GET['id']));
                break;

         
  
                
              

    }

}
 
if(isset($_FILES['thefile']) && isset($_POST['type']))
{
            $type=$_POST['type'];
            $uploading_ngo=new ngo($ngo->get_id());
            if($type=="file")
            {
            $uploading_ngo->upload($_FILES['thefile']);
            }
            elseif($type="image")
            {
              if($uploading_ngo->uploadlogo($_FILES['thefile'])==true)
              {
                 $ngo->set_img("file".$ngo->get_id().basename($_FILES['thefile']['name']));
                 $_SESSION['ngo']=$ngo;
          
  
              }
            }
         
}

if(isset($_POST['budget']))
{
              $data=[];
              $data['request_time']="";
              $data['request_title']=$_POST['title'];
              $data['request_desc']=$_POST['desc'];
              $data['request_budget']=$_POST['budget'];
              $data['request_strategy']=$_POST['str'];
              $data['request_status']="open";
              $files=$_FILES['reqimages'];
              $obj=new ngo($ngo->get_id());
              $exta=['jpg','jpeg','png','PNG','JPG','JPEG'];
              $filenames=$files['name'];
              $status=true;
              for($b=0;$b<count($filenames);$b++)
              { 
                $ext=pathinfo($filenames[$b],PATHINFO_EXTENSION);
          
                if(!in_array($ext,$exta)){$status=false;}
              
              }
              if($status===true)
              {
              if($obj->newRequest($data,$files)){ print "request posted";}
              else{print "request failed";}
              }
              else
              {
                print "only JPG and PNG images are allowed";
              }
             //}
             //else
             //{
               //print "cannot handle empty requests";
             //}

 // print($_POST['budget']);
 // print "hey";
}



?>