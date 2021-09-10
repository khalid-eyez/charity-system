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
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../ui/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <script src="../ui/plugins/jquery/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../ui/sweet.js"></script>
  <script>
       </script>
</head>
<body class="hold-transition layout-top-nav">
    <?php
      $db_name="charity_db";
      $db_user="root";
      $db_server="localhost";
      $db_pwd="";
      $conn=mysqli_connect($db_server,$db_user,$db_pwd);
      mysqli_select_db($conn,$db_name);
  
      $sql="select * from ngo";
      $sql2="select * from donor";
      $sql3="select * from donations";
      $sql4="select * from requests";
  
      $data=mysqli_query($conn,$sql) or die(mysqli_error($conn));
      $data1=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
      $data2=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
      $data3=mysqli_query($conn,$sql4) or die(mysqli_error($conn));

      $numngos=mysqli_num_rows($data);
      $numdonors=mysqli_num_rows($data1);
      $numdonations=mysqli_num_rows($data2);
      $numrequests=mysqli_num_rows($data3);





    ?>
           <div id="layoutSidenav_content" style="margin-top: 2%;">
                <main>
                    <div class="container-fluid">
                        <!-- test -->
                        <div class="row" >
                         
                                <!-- test -->
                        <div class="row col-xl-12 col-md-12">
                            <div class="col-xl-3 col-md-4">
                                <div class="card bg-light text-blue mb-4">
                                    <div class="card-body">Total NGOS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fa fa-users fa-2x"></i>
                                        <h6><?php echo $numngos ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="card bg-light text-blue mb-4">
                                    <div class="card-body">Total Donors</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fas fa-donate fa-2x"></i>
                                        <h6><?php echo $numdonors ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="card bg-light text-blue mb-4">
                                    <div class="card-body">Total Donations</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fas fa-hand-holding-usd fa-2x"></i>
                                        <h6><?php echo $numdonations?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="card bg-light text-blue mb-4">
                                    <div class="card-body">Total Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fas fa-dollar-sign fa-2x"></i>
                                        <h6><?php echo $numrequests ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                  
                </div>
                <!-- test -->
                    </div>

                </body>
                </html>
