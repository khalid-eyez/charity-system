<?php


namespace eng\obj;

use \model\{admin_model,donor_model,ngo_model,ngouploads_model};
require_once("../../autoload.php");
class ngo extends charity_user
{
  
    public function __construct($ngoid=null)
    {
        $this->data=new ngo_model($ngoid);
    }
    public function createAccount($data)
    {
        $this->data->set_ngo($data);
        if($this->data->save_ngo()){return true;}else{return false;}
    }
    public function viewInfo()
    {
      
      $output=[];
      $output['img']=$this->data->get_img();
      $output['name']=$this->data->get_name();
      $output['email']=$this->data->get_email();
      $output['phone']=$this->data->get_phone();
      $output['country']=$this->data->get_country();
      $output['city']=$this->data->get_city();
      $output['status']=$this->data->get_status();
  
      return json_encode($output);
      
    }
    public function viewuploads()
    {
      $uploads=$this->data->get_all_uploads();
      $uploads_item=[];
      $uploads_obj=[];

      for($r=0;$r<count($uploads);$r++)
      {
        $item=$uploads[$r];
        $uploads_item["path"]=$item->get_path();
        $uploads_item["id"]=$item->get_id();
        array_push($uploads_obj,$uploads_item);
      }
      
      print json_encode($uploads_obj);
    }
    public function viewRequests()
    {
      $returned="";
      $all=$this->data->get_all_requests();
      //print($this->data->get_id());
      for($req=0;$req<count($all);$req++)
      {
    $return='<tr data-widget="expandable-table" aria-expanded="false">';
    $return.='<td>';
    $return.='<i class="expandable-table-caret fas fa-caret-right fa-fw"></i>';  
    $return.=''.$all[$req]->get_title().'</td>';
    $return.='</tr>';
    $return.='<tr class="expandable-body d-none">';
    $return.='<td>';
    $return.='<div class="p-0" style="display: none;">';
    $return.='<table class="table table-hover">';
    $return.='<tbody>';
    $return.='<tr data-widget="expandable-table" aria-expanded="false">';
    $return.='<td>';
    $return.='<i class="expandable-table-caret fas fa-caret-right fa-fw"></i>';         
    $return.='</td>';
    $return.='</tr>';
    $return.='</tbody>';
    $return.='</table>';
    $return.='</div>';
    $return.='</td>';
    $return.='</tr>';
  

    $returned.=$return;
              
    }

    return $returned;
  }
    public function login($pass,$email)
    {
        if($this->data->load_ngo($pass,$email)==true)
        {
            $_SESSION["ngo"]=$this->data;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function verify($ngo)
    {
        
    }
    public function newRequest($data)
    {
      $this->data->get_request()->set_request($data);
      if($this->data->get_request()->save_request($this->data->get_id())){return true;}else{return false;}
    }
    public function delete($reqid)
    {
      $this->data->request->load_request($reqid);
      if($this->data->request->delete()){return true;}else{return false;}
    }
    public function open($reqid,$value="open")
    {
      $this->data->request->load_request($reqid);
      if($this->data->request->update("status",$value)){return true;}else{return false;}
    }
    public function close($reqid,$value="closed")
    {
     $this->data->request->load_request($reqid);
     if($this->data->request->update("status",$value)){return true;}else{return false;}
    }
    public function delete_file($fileid){
    
                $deletefile=$this->data->get_upload();
                $deletefile=new ngouploads_model($fileid);
                if($deletefile->delete()==true){ $path="../../data/".$deletefile->get_path(); unlink($path); print "done";}
                else{print "deleting failed";}
    }
  public function upload($file)
  {

$target_dir = "../../data/";
$target_file = $target_dir . basename($file["name"]);
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
     
     $uploadata=[];
     $uploadata['upload_time']=date('h:i:sa');
     $uploadata['upload_date']=date('d/m/Y');
     $uploadata['path']=basename($file["name"]);
     $uploadata['ngo_id']=$this->data->get_id();
    
     $uploadmod=$this->data->get_upload();
     $uploadmod->set_upload($uploadata);

     if($uploadmod->save_upload()==true){print "file upload successful";}
     else{ unlink($target_file); print "file not uploaded, try again";}
  } else {
    print "file not uploaded, try again";
  }
}
  }

  //uploading logo and images

  public function uploadlogo($file)
  {

$target_dir ="../../ui/dist/img/";
$target_file = $target_dir ."file".$this->data->get_id().basename($file["name"]);
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
  if (move_uploaded_file($file["tmp_name"],$target_file)) {
    
     
     $uploadmod=$this->data;

     if($uploadmod->update("NGO_img","file".$this->data->get_id().basename($file["name"]))==true){  print "image/logo changed"; return true;}
     else{ unlink($target_file); print "updating failed";}
  } else {
    print "updating failed";
  }
}
  }
    //update

//setters and getters

public function set_data($d)
{
  $this->data=$d;
}
public function get_data()
{
  return $this->data;
}
}




?>