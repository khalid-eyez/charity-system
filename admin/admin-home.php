<?php session_start(); if(isset($_SESSION['name'])){?>
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
  $('document').ready(function(){

  //getting the name
   // $.get("../eng/controllers/controller.ngo.php",
 // {
   // request: "name",
    
 // },
 // function(data){
 
      //$('#ngoname').html(data);
      //alert("impossible to login");
   
 // });


   
 // });

  



    //$data='<div class="tab-pane fade" id="9" role="tabpanel" aria-labelledby="2"><iframe src="load_requests.html"></iframe></div>';
   // $('#reqrapper').html($data);

  
  })
   
 
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed " data-panel-auto-height-mode="height"  >
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:  rgb(152, 29, 223);">
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color:white; font-weight: bolder;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" >
        <a href="admin-dash.php" class="nav-link" style="color:white; font-weight: bolder;">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav" style="margin-left:80%">
      <li class="nav-item" id="logout">
        <a  href="logout.php" role="button">
          <i class="fas fa-sign-out-alt fa-2x" style="color: white;"></i><b style="color:white">logout</b>
        </a>
      </li>

      </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(152, 29, 223);">
    <!-- Brand Logo -->
    <a href="" class="brand-link" >
      <img src="../ui/dist/img/logo.png" alt="charity system" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text" style="font-weight: bold; color:white;font-size: medium;">Charity System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: rgb(255, 255, 255);">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <?php echo "logged in as: <b style='color:blue'>".$_SESSION['name']."</b>"; ?>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="ngos.php" class="nav-link">
              <img src="../ui/dist/img/ngo.jpg" alt="charity system" class="brand-image img-circle elevation-3" style="opacity:1; width:20%;height: 20%;">
              <p>
               Manage NGOs
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="donors.php" class="nav-link">
              <img src="../ui/dist/img/donate.png" alt="charity system" class="brand-image img-circle elevation-3" style="opacity:1; width:20%;height: 20%;">
              <p>
               Manage Donors
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="requests.php" class="nav-link">
              <img src="../ui/dist/img/beg.png" alt="charity system" class="brand-image img-circle elevation-3" style="opacity:1; width:20%;height: 20%;">
              <p>
               Manage Requests
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750" style="background-color:rgb(221, 233, 243);overflow:hidden;">
    <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0" style="color:white">
      <ul class="navbar-nav overflow-hidden" role="tablist" style="width:10%;"></ul>

    </div>
    <div class="tab-content" style="padding-left:2%; padding-right: 2%; padding-top:2%;overflow: hidden;">
      <div class="tab-pane fade active show" id="panel-admin-dash-php" role="tabpanel" aria-labelledby="tab-admin-dash-php"><iframe src="admin-dash.php" style="height:500px;"></iframe></div>
      <div class="tab-loading">
        <div>
          <h2 class="display-4">loading <i class="fa fa-sync fa-spin"></i></h2>
        </div>
        </div>
   
       
     
      <!-- /.card-body -->
    </div>

  </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">&copy; 2020-2021 <a href="#">charity group</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b>1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../ui/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../ui/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../ui/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../ui/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../ui/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../ui/dist/js/demo.js"></script>
</body>
</html>
<?php }else{header("location:index.html");} ?>