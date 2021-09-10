<?php
 $db_name="charity_db";
 $db_user="root";
 $db_server="localhost";
 $db_pwd="";
 $conn=mysqli_connect($db_server,$db_user,$db_pwd);
 mysqli_select_db($conn,$db_name);
if(isset($_GET['action']))
{
  

    $action=$_GET['action'];

    switch($action)
    {

     case "delete_ngo":

     $ngo_id=$_GET['id'];

     $sql="delete from ngo where NGO_id=".$ngo_id;
     mysqli_query($conn,$sql) or die(mysqli_error($conn));
     header("location:ngos.php");
        break;

    case "delete_donor":


    $donor_id=$_GET['id'];

    $sql="delete from donor where donor_id=".$donor_id;
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header("location:donors.php");
        break;


    case "close_req":


        $req_id=$_GET['id'];

        $sql="update requests set status='closed' where req_id=".$req_id;
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("location:requests.php");
            break;


    case "open_req":


        $req_id=$_GET['id'];

        $sql="update requests set status='open' where req_id=".$req_id;
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("location:requests.php");
            break;


    case "delete_req":


        $req_id=$_GET['id'];

        $sql="delete from requests where req_id=".$req_id;
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("location:requests.php");
            break;
            
    case "verify_ngo":


        $ngo_id=$_GET['id'];

        $sql="update ngo set NGO_status='verified' where NGO_id=".$ngo_id;
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("location:ngos.php");
            break;

    














    }




}

























?>