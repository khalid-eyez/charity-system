<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../ui/dist/css/adminlte.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../ui/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="admin-plugs/dataTables.bootstrap4.min.css">
  <script src="../ui/plugins/jquery/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="/admin-plugs/dataTables.boostrap4.min.js"></script>
  <script src="/admin-plugs/dataTables.min.js"></script>
  <script src="../ui/sweet.js"></script>
 
</head>
<body>
<?php 
if(true){
    $db_name="charity_db";
    $db_user="root";
    $db_server="localhost";
    $db_pwd="";
    $conn=mysqli_connect($db_server,$db_user,$db_pwd);
    mysqli_select_db($conn,$db_name);

    $sql="select * from ngo";

    $data=mysqli_query($conn,$sql) or die(mysqli_error($conn));


    

?>
<div id="layoutSidenav_content">
    <main>

            <div class="clear"></div>

            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th class="td_checkbox">
                #
            </th>

            <th>
                Name
            </th>

            <th>
                country
            </th>       

            <th>
                city
            </th>
            <th>
                email
            </th>
            <th>
            phone number
            </th>
            <th>
            	Status
            </th>
            <th>
            	logo
            </th>
            <th>
            	Attachments
            </th>
            <th data-hide="phone">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $c = 1;
       
    while($ngos=mysqli_fetch_array($data))
    {

     ?>
    <tr class="table_row">
        <td>
        <?php echo $c; ?>
        </td>
        <td>
           <?php echo $ngos['NGO_name']; ?>
        </td>

        <td>
           <?php echo $ngos['NGO_country']; ?>
        </td>
        
        <td>
            <?php echo $ngos['NGO_city']; ?>
        </td>
         <td>
             <?php echo $ngos['NGO_email']; ?>
         </td>  
         <td>
         	<?php echo $ngos['NGO_phoneno']; ?>
         </td> 
         <td>
         	<?php echo $ngos['NGO_status']; ?>
         </td>    
         <td>
         
         	<?php $logo=$ngos['NGO_img']; 
             echo '<a href="" class="brand-link" ><img src="../ui/dist/img/'.$logo.'" alt="charity system" class="brand-image img-circle elevation-3" style="opacity: 1"></a>'; ?>
         </td> 
         <td>
         
         <?php $id=$ngos['NGO_id']; 
         $filesik="select * from ngo_uploads where NGO_id=".$id." limit 5";
         $filesreturn=mysqli_query($conn,$filesik) or die(myqli_error($conn));

         while($files=mysqli_fetch_array($filesreturn))
         {
          $fileext=pathinfo($files['path'], PATHINFO_EXTENSION);
          if(in_array($fileext,['pdf','PDF']))
          {
         ?>
         <a href="../data/<?php echo $files['path']; ?>"><i class="fa fa-file-pdf-o" style="font-size:24px;color:red"></i></a> 
         <?php
          }
          else{
              ?>
            <a href="../data/<?php echo $files['path']; ?>"><i class="fa fa-paperclip" style="font-size:24px;color:red"></i></a>
            <?php

          }
         }
         ?>
       </td> 
        <td>
        <a href="admin-actions.php?id=<?php echo $ngos['NGO_id'];?>&&action=verify_ngo" class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
        </a>
        <a href="admin-actions.php?id=<?php echo $ngos['NGO_id'];?>&&action=delete_ngo" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i>
        </a>
        </td>
        </tr>
        <?php 
        $c++;
            }
         ?>

    </tbody>
    </table>
<?php  
   
?>

  </div>
<script>
    $(document).ready(function() {
    $('#dataTables-example').DataTable();
});
    </script>

<?php }else{ //logOut(); 
}?>
</body>
</html>