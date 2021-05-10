<?php

namespace eng\obj;
use \model\{admin_model,donor_model,ngo_model};

require_once("../../autoload.php");

class donor extends charity_user
{

    public function __construct($donorid=null)
    {
        $this->data=new donor_model($donorid);
    }

    public  function createAccount($data)
    {
      $this->data->set_donor($data);
      if($this->data->save_donor()){return true;}else{return false;}
    }
    public  function viewInfo()
    {
      $output=[];
      $output['img']=$this->data->get_img();
      $output['name']=$this->data->get_fname();
      $output['email']=$this->data->get_email();
      $output['country']=$this->data->get_country();
      $output['city']=$this->data->get_city();
     
  
      return json_encode($output);
    }
    public function uploadlogo($file)
    {
  
  $target_dir ="../../ui/dist/img/";
  $target_file = $target_dir .$this->data->get_id().basename($file["name"]);
  $uploadOk = 1;
  if (file_exists($target_file)) {
    print "file already exists.";
    $uploadOk = 0;
  }
  
  if ($file["size"] > 50000000) {
    print "file too large.";
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
   print "file not uploaded.";
  } else {
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
      
       
       $uploadmod=$this->data;
  
       if($uploadmod->update("donor_img",$this->data->get_id().basename($file["name"]))==true){ return true; }
       else{ unlink($target_file); print "updating failed";}
    } else {
      print "updating failed";
    }
  }
    }
    public  function viewRequests()
    {

    }
    public function donate($data)
    {
      $this->data->get_donation()->set_donation($data);
      if($this->data->get_donation()->save_donation()==true){return true;}else{return false;}
    }
    public function comment($data)
    {
      $this->data->comment->set_comment($data);
      $this->data->comment->save_comment();
    }
    public function viewDonations()
    {

    }
    public function login($pass,$email)
    {
        if($this->data->load_donor($pass,$email))
        {
            $_SESSION["donor"]=$this->data;
            return true;
        }
        else
        {
            return false;
        }
    }
   //update
    //getters and setters

    public function set_data($data){$this->data=$data;}
    public function get_data(){return $this->data;}



}







?>