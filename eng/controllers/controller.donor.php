<?php

namespace eng\controllers;
use \eng\obj\donor;
require_once("../../autoload.php");
session_start();
//ngo name
$donor=$_SESSION['donor'];
if(isset($_GET['request']))
{
  
    switch($_GET['request'])
    {
      case "name":
        print $donor->get_fname();
        break;
      

      case "img":
        if($donor->get_img()!="")
        {
        print $donor->get_img();
        }
        else{
            print "user.png";
        }
        break;

        case "logout":
            session_destroy();
            session_unset();

            print "done";
            break;
        case "loggedin":
            
                if(!isset($_SESSION['donor'])){print "false";}
                else{print "true";}
            break;
       /* case "new request":

             if(isset($_GET['title']) && isset($_GET['desc']) && isset($_GET['budget']) && isset($_GET['strategy'])) 
             {
              
              $data=[];
              $data['request_time']="";
              $data['request_title']=$_GET['title'];
              $data['request_desc']=$_GET['desc'];
              $data['request_budget']=$_GET['budget'];
              $data['request_strategy']=$_GET['strategy'];
              $data['request_status']="open";
            
              $obj=new ngo($ngo->get_id());
              if($obj->newRequest($data)){ print "request posted";}
              else{print "request failed";}


             }
             else
             {
               print "cannot handle empty requests";
             }

             break;
             */
            case "allinfo":
              $obj3=new donor($donor->get_id());

              print $obj3->viewInfo();
            

              break;
            case "updateinfo":
                
              $name=$_GET['name'];
              $country=$_GET['country'];
              $city=$_GET['city'];
              $email=$_GET['email'];
            
              
              $update_donor=new donor($donor->get_id());
              $update_donor_mod=$update_donor->get_data();
              if($update_donor_mod->update('donor_fname',$name) && $update_donor_mod->update('donor_country',$country) && $update_donor_mod->update('donor_city',$city) && $update_donor_mod->update('donor_email',$email))
              {
                $donor->set_fname($name);
                $donor->set_email($email);
                $donor->set_country($country);
                $donor->set_city($city);

                $_SESSION['donor']=$donor;

                print "done";

              }
              else{
                print "not done";
              }
              break;
              case "donate":

                if(isset($_GET['rec']) && isset($_GET['amount'])) 
                {
                 
                 $data=[];
                 $data['don_time']="";
                 $data['don_date']="";
                 $data['amount']=$_GET['amount'];
                 $data['recommandation']=$_GET['rec'];
                 $data['req_id']=$_GET['reqid'];
                 $data['donor']=$donor->get_id();
                 $obj=new donor($donor->get_id());
                 if($obj->donate($data)){ print "donation successful";}
                 else{print "donation failed, try again";}
   
   
                }
                else
                {
                  print "empty requests";
                }
   
                break;

    }

}
if(isset($_FILES['thefile']))
{

            $uploading_donor=new donor($donor->get_id());
            if($uploading_donor->uploadlogo($_FILES['thefile'])==true)
            {
               $donor->set_img($donor->get_id().basename($_FILES['thefile']['name']));
               $_SESSION['donor']=$donor;
               print "image/logo changed";

            }
         
}

 




?>