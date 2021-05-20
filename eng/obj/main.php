<?php 
namespace eng\obj;
use \model\{admin_model,donor_model,ngo_model,main_model};
require_once("../../autoload.php");

class main 
{
  private $requests;

  public function __construct($id=null)
  {
  if($id==null)
  {
   $this->requests=(new main_model())->get_all_requests();
  }
  else
  {
    $this->requests=(new main_model($id))->get_all_requests();
  }
  }
 public function viewAll()
 {
   $returnall=array('img'=>array(),'name'=>array(),'title'=>array(),'budget'=>array(),'desc'=>array(),'ids'=>array(),'comno'=>array(),'comments'=>array());
   for($i=0;$i<count($this->requests);$i++)
   {
    $ngo=new ngo_model($this->requests[$i]->get_ngo_id());
    array_push($returnall['img'],$ngo->get_img());
    array_push($returnall['name'],$ngo->get_name());
    array_push($returnall['title'],$this->requests[$i]->get_title());
    array_push($returnall['budget'],$this->requests[$i]->get_budget());
    array_push($returnall['desc'],$this->requests[$i]->get_desc());
    array_push($returnall['ids'],$this->requests[$i]->get_id());
    array_push($returnall['comno'],count($this->requests[$i]->get_all_comments()));
    $allcomm=$this->requests[$i]->get_all_comments();
    for($c=0;$c<count($allcomm);$c++)
    {
    array_push($returnall['comments'],$allcomm[$c]->get_comment());

   }

  }

   return $returnall;

 }



}





?>
