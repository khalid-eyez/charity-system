
<?php
session_start();
if(isset($_GET['adminlogin']))
{
  $pwd=$_GET['pwd'];
  $email=$_GET['email'];

  //setting up the database connection

  $db_name="charity_db";
  $db_user="root";
  $db_server="localhost";
  $db_pwd="";
  $conn=mysqli_connect($db_server,$db_user,$db_pwd);
  mysqli_select_db($conn,$db_name);

  $sql="select * from admin where admin_email='$email'";

  $data=mysqli_query($conn,$sql) or die(mysqli_error($conn));

  if(mysqli_num_rows($data)>0)
  {
    //email found, now tis time for checking the pssword
    $encpass="";
    $name="";
    $id;
    while($res=mysqli_fetch_array($data))
    {
        $encpass=$res['admin_pwd'];
        $name=$res['admin_lname'];
        $id=$res['adminid'];
    }

    //comparison and decision

    if($encpass!="")
    {
      if(password_verify($pwd,$encpass))
      {
            //the password is okay
        $_SESSION['adminid']=$id;
        $_SESSION['name']=$name;

       print "good";
      }
      else
      {
       print "not good";
      }
      
      
    }


  }
  else
  {
    print "not good";
  }
 

}







?>