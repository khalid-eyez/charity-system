<?php


namespace eng\obj;
use \model\{admin_model,donor_model,ngo_model};
require_once("../../autoload.php");
class admin 
{

 private $data;

 public function __construct()
 {
     $this->data=new admin_model();
 }
 public function __construct($data)
 {
   $this->data=$data;
 }
 public function login($pass,$email)
 {
  if($this->data->load_admin($pass,$email))
  {
      $_SESSION["admin"]=$this->data;
      return true;
  }
  else
  {
      return false;
  }
 }
 public function viewInfo()
 {
   
 }
 public function update($field,$value)
 {
   $this->data->update($field,$value);
 }
 public function viewNgos()
 {

 }
 public function viewDonors()
 {

 }
 public function deleteDonor($donorid)
 {
  $this->data->donor= new donor_model($donorid);
  $this->data->donor->delete();
 }
 public function deleteNgo($ngoid)
 {
  $ngo=$this->data->ngo;
  $ngo=new ngo_model($ngoid);
  $ngo->delete();
 }
 public function deleteComment($comid)
 {
 $com=$this->data->ngo->request->comment;
 $com=new comments_model($comid);
 $com->delete();
 }
 public function deleteRequest($requestid)
 {
  $req=$this->data->ngo->request;
  $req=new request_model($requestid);
  $req->delete();
 } 
 public function validateNgo($ngoid)
 {
  $validngo=$this->data->ngo;
  $validngo=new ngo_model($ngoid);
  $validngo->update("ngo_status",1);
 }

 //setters and getters
public function set_data($ngodata){$this->data=$ngodata;}
public function get_data(){return $this->data;}




}



?>