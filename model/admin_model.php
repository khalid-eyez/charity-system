<?php


namespace model;

require_once("../autoload.php");
class admin_model extends charity_db
{
 private $admin_id;
 private $admin_fname;
 private $admin_lname;
 private $admin_email;
 private $admin_pwd;
 private $admin_img;

 //containing objects, the admin must be able to view all donors and ngos and take actions

 private $donor;
 private $ngo;
 
 private $all_ngos=[];
 private $all_donors=[];

 public function __construct()
 {
     parent::__construct();
     $this->admin_fname="";
     $this->admin_lname="";
     $this->admin_email="";
     $this->admin_pwd="";
     $this->admin_img="";
     $this->actor="admin";
     $this->donor=new donor_model();
     $this->ngo=new ngo_model();
     $this->load_ngos();
     $this->load_donors();
 }
 //loading an admin by email and password, is used for an admin first login
 public function load_admin($pass,$email)
 {
     $sql="select * from admin where admin_email='$email' && admin_pwd='$pass'";
     $res=parent::fetch_data($sql);
     if($res==1){return false;}
     else
     {
         while($admin_data=mysqli_fetch_assoc($res))
         {
             $this->admin_id=$admin_data['adminid'];
             $this->admin_fname=$admin_data['admin_fname'];
             $this->admin_lname=$admin_data['admin_lname'];
             $this->admin_email=$admin_data['admin_email'];
             $this->admin_pwd=$admin_data['admin_pwd'];
             $this->admin_img=$admin_data['admin_img'];
         }

         return true;
     }

 }
 //updating admin field, used when an admin decides to change his info like password or email
  public function update($field,$value)
  {
      $sql="update admin set ".$field."=".$value." where adminid=".$this->admin_id;
      if(parent::update_data($sql)){$this->{$field}=$value; return true;}else{return false;}
  }
  //loading all ngos, for viewing by this admin

  private function load_ngos()
  {
   $this->entity="ngo";
   $ngos_data=parent::fetch_all();

   if($ngos_data!=1)
   {
     while($ng=mysqli_fetch_assoc($ngos_data))
     {
     $this->ngo=new ngo_model($ng['ngo_id']);
     arraypush($this->all_ngos,$this->ngo);
     }
   }

    $this->ngo=new ngo_model();
  }
  //loading all donors, for viewing by this admin

  private function load_donors()
  {
   $this->entity="donor";
   $donors_data=parent::fetch_all();

   if($donors_data!=1)
   {
     while($dn=mysqli_fetch_assoc($donors_data))
     {
     $this->donor=new donor_model($dn['donor_id']);
     arraypush($this->all_donors,$this->donor);
     }
   }

    $this->donor=new donor_model();
  }

//setters and getters
 public function set_fname($name){$this->admin_fname=$name;}
 public function set_lname($name){$this->admin_lname=$name;}
 public function set_email($email){$this->admin_email=$email;}
 public function set_pwd($pwd){$this->admin_pwd=$pwd;}
 public function set_img($img){$this->admin_img=$img;}
 public function set_donor($donor){$this->donor=$donor;}
 public function set_ngo($ngo){$this->ngo=$ngo;}

 public function get_fname(){ return $this->admin_fname;}
 public function get_lname(){return $this->admin_lname;}
 public function get_email(){return $this->admin_email;}
 public function get_pwd(){return $this->admin_pwd;}
 public function get_img(){return $this->admin_img;}
 public function get_donor(){return $this->donor;}
 public function get_ngo(){return $this->ngo;}
 public function get_all_donors(){return $this->all_donors();}
 public function get_all_ngos(){return $this->all_ngos();}


}


?>