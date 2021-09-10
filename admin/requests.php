<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../ui/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../ui/dist/css/adminlte.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../ui/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="admin-plugs/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../ui/plugins/jquery/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

  
  <script src="admin-plugs/dataTables.boostrap4.min.js"></script>
  <script src="admin-plugs/dataTables.min.js"></script>
  <script src="../ui/sweet.js"></script>
 
</head>
<body>
<?php 
//if(true){
    $db_name="charity_db";
    $db_user="root";
    $db_server="localhost";
    $db_pwd="";
    $conn=mysqli_connect($db_server,$db_user,$db_pwd);
    mysqli_select_db($conn,$db_name);

    $sql="select * from requests,ngo where requests.NGO_id=ngo.NGO_id order by requests.req_id desc";

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
              Request time
            </th>

            <th>
               title
            </th>       

            <th>
                budget
            </th>
            <th>
                Requested by
            </th>
            <th>
                status
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
           <?php echo $ngos['request_time'] ?>
        </td>

        <td>
           <?php echo $ngos['title']; ?>
        </td>
        
        <td>
            <?php echo $ngos['budget']; ?>
        </td>
         <td>
             <?php echo $ngos['NGO_name']; ?>
         </td>  
        
         <td>
            <?php echo $ngos['status']; ?>
         </td> 
        <td>
        <?php if($ngos['status']==="open"){ ?>
        <a href="admin-actions.php?id=<?php echo $ngos['req_id'];?>&&action=close_req" class="btn btn-primary btn-sm"><i class="fa fa-close"></i></a>
        <?php }else{ ?>
            <a href="admin-actions.php?id=<?php echo $ngos['req_id'];?>&&action=open_req" class="btn btn-primary btn-sm"><i class="fa fa-folder-open-o"></i></a>
            <?php } ?>
       
        <a href="admin-actions.php?id=<?php echo $ngos['req_id'];?>&&action=delete_req" class="btn btn-danger btn-sm" onclick=""><i class="fa fa-trash"></i></a>
        
        </td>
        </tr>
        <?php 
        $c++;
            }
         ?>

    </tbody>
    </table>

  </div>
<script>
    $(document).ready(function() {
    $('#dataTables-example').DataTable();
});
    </script>

<?php// }else{ //logOut(); 
//}?>
</body>
</html>