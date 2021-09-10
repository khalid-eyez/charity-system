<?php
  session_start();
  if(isset($_SESSION['donor'])){header("location:ui/donor_dash.html");}
  else if(isset($_SESSION['ngo'])){header("location:ui/ngo_dash.html");}
  else
  {
  ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="donation saves lifes" /> 
  <meta property="og:description" content="DONATE TO HELP PEOPLE IN TROUBLE" /> 
  <meta property="og:image" content="http://charity.potex.co.tz/dist/img/logo.jpg" /><meta property="og:image" content="http://www.[ourwebsite].com/overdriven-blues-music-tshirt-art-black.JPG" />
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="http://charity.potex.co.tz/main.html" />
  <meta property="og:site_name" content="the charity system" />      
  <meta name="title" content="the best way for your donation" />
  <meta name="description" content="donate to save life, make the world a better place" />
  <link rel="image_src" href="http://charity.potex.co.tz/dist/img/logo.jpg" />
  <title>charity main</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="ui/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="ui/plugins/jquery/jquery.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="ui/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="ui/sweet.js"></script>

  <script>
 
  $('document').ready(function(){
    function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

    $('#ngo').click(function(d){

d.preventDefault();

var pass=$('#passd').val();
var rpass=$('#rpass').val();
var username=$('#mail').val();
if(!validateEmail(username)){swal("invalid email","","error");return false;}
var name=$('#name').val();
if(pass!="" && username!="" && name!="" && rpass!="")
{
  if(pass===rpass)
  {
$.get("eng/controllers/controller.register.php",
{
  pass: pass,
  username: username,
  name:name,
  user:"ngo"
},
function(data){
  $('#passd').val("");
  $('#rpass').val("");
  $('#mail').val("");
  $('#name').val("");
  if(data=="yes"){swal("","registration successful","info");}
  else
  { 
    swal(data+"registration failed","","info");
    //alert("impossible to login");
  }
});
}
else
{
swal("input error","passwords are not identical","error");
}
}
else{
   swal("fill in all fields","","info");

}


});

//the donor

$('#rdonor').click(function(k){

k.preventDefault();

var pass=$('#passd').val();
var rpass=$('#rpass').val();
var username=$('#mail').val();
if(!validateEmail(username)){swal("invalid email","","error");return false;}
var name=$('#name').val();
if(pass!="" && username!="" && name!="" && rpass!="")
{
if(pass===rpass)
{
$.get("eng/controllers/controller.register.php",
{
pass: pass,
username: username,
name:name,
user:"donor"
},
function(data){
  $('#passd').val("");
  $('#rpass').val("");
  $('#mail').val("");
  $('#name').val("");
if(data=="yes"){

  swal("","registration successful","info");

  }
else
{ 
  swal(data+"registration failed","","info");
  //alert("impossible to login");
}
});
}
else
{
swal("input error","passwords are not identical","error");
}
}
else{
 swal("fill in all fields","","info");

}


})
  $.get("eng/controllers/controller.main.php",
  {
    request:"allrequests"
    
  },
  function(data){
 
    var dataobj=$.parseJSON(data);
   var totelem="";
 
     for(var z in dataobj.name)
     {
       var img=dataobj.img[z];
       var name=dataobj.name[z];
       var title=dataobj.title[z];
       var budget=dataobj.budget[z];
       var desc=dataobj.desc[z];
       var ids=dataobj.ids[z];
        var elem='<div class="content">';
          elem+='<div class="content">';
          elem+='<div class="content">';
          elem+='<div class="container">';
          elem+='<div class="card">';
          elem+='<div class="card-header p-2 " >';
          elem+='<div class="user-block" style="margin-right:20%">';
          elem+='<img class="img-circle img-bordered-sm" src="ui/dist/img/'+img+'" >';
          elem+='<span class="username">';
          elem+='<a href="#">'+name+'</a>';
          elem+='</span>';
          elem+='</div>';
          elem+='<div class="row">';
          elem+='<div class="col-lg-5">';
          elem+='<span><b>'+title+'</b></span>';
          elem+='</div>';
          elem+='<div class="col-md-4">';
          elem+='<img class="img-circle img-bordered-sm" src="ui/dist/img/beg.png" alt="beg icon" style="height:85%;width:20%">';
          elem+='<span>'+budget+'TZS required</span>';
          elem+='</div>';
          elem+='<div class="col-md-3">';
          elem+='<span>';
          elem+='<a href="#" class="link-black text-sm">';
          elem+='<button style="font-size:24px">Donate<i class="fa fa-cc-paypal" style="color:blue"></i></button>';
          elem+='</a>';
          elem+='</span>';
          elem+='</div>';
          elem+='</div>';
          elem+='</div>';
          elem+='<div class="card-body">';
          elem+='<div class="tab-content">';
          elem+='<div class="active tab-pane" id="activity">';
          elem+='<div class="post">';
          elem+='<p>'+desc+'</p>';
          elem+='<p>';
          elem+='<a href="#" class="link-black text-sm mr-2" id="'+ids+'"><i class="fa fa-facebook-square" aria-hidden="true" style="font-size:18px">share</i></a>';
          elem+='<span class="float-right">';
          elem+='<a href="#" class="link-black text-sm">';
          elem+='<i class="far fa-comments mr-1"></i> Comments (5)';
          elem+='</a>';
          elem+='</span>';
          elem+='</p>';
          elem+='<input class="form-control form-control-sm" type="text" placeholder="Type a comment">';
          elem+='</div>';
          elem+='</div>';
          elem+='</div>';
          elem+='</div>';
          elem+='</div>';
          elem+='</div>';
          elem+='</div>';
          elem+='</div>';
          totelem+=elem;
          
   

     }
   
   $('#reqrapper').append(totelem);
   $('#loader').hide();
  });

 $('#login').click(function(d){

  d.preventDefault();

  var pass=$('#pass').val();
  var username=$('#user').val();
  if(pass!="" && username!="")
  {
  $.get("eng/controllers/controller.login.php",
  {
    pass: pass,
    username: username
  },
  function(data){
    if(data=="donor"){window.location.href='ui/donor_dash.html';}
    else if(data=="ngo"){window.location.href='ui/ngo_dash.html';}
    else
    { 
      swal("login failed",data+"incorrect password or email","info");
      //alert("impossible to login");
    }
  });
}
else{
     swal("all fields are required","","info");

}


 })
  })


  </script>
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="background-color: rgb(152, 29, 223);color: rgb(255, 255, 255);">
    <div class="container-fluid" >
      <a href="" class="navbar-brand" style="color: rgb(255, 255, 255);">
        <img src="ui/dist/img/logo.png" alt="charity logo" class="brand-image img-circle elevation-2" style="opacity: 1" >
        <span class="brand-text" >Charity System</span>
      </a>

        <!-- SEARCH FORM -->
   
        <a class="nav-link" href="#" role="button" style="color: white;" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-sign-in-alt fa-2x"></i><b>Login</b>
      </a>
      <a class="nav-link" href="#" role="button" style="color: white;" data-toggle="modal" data-target="#modal-reg">
      <i class="fas fa-user fa-2x"></i><b> Sign Up</b>
      </a>
      </div>
    
      <!-- Right navbar links -->
     
    </nav> 
    
  </div>
 
  <!-- /.navbar -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:95%;height:520px;margin-left:2.5%">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="ui/dist/img/c/1.jpg" style="height:520px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Many people around the world are still homeless</h5>
          <p onmouseover="this.style.backgroundColor='#aaf'" onmouseout="this.style.backgroundColor=''"><a class="nav-link" href="#" role="button" style="color: white;border:solid 1px white" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-sign-in-alt fa-2x"></i>Login to donate
          </a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="ui/dist/img/c/2.jpg" style="height:520px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Many more still lack food and clothes</h5>
          <p onmouseover="this.style.backgroundColor='#aaf'" onmouseout="this.style.backgroundColor=''"><a class="nav-link" href="#" role="button" style="color: white;border:solid 1px white" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-sign-in-alt fa-2x"></i>Login to donate
          </a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="ui/dist/img/c/3.jpg" style="height:520px">
        <div class="carousel-caption d-none d-md-block">
          <h5>others still sleep outside</h5>
          <p onmouseover="this.style.backgroundColor='#aaf'" onmouseout="this.style.backgroundColor=''"><a class="nav-link" href="#" role="button" style="color: white;border:solid 1px white" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-sign-in-alt fa-2x"></i>Login to donate
          </a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="ui/dist/img/c/4.jpg" style="height:520px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Many others are starving</h5>
          <p onmouseover="this.style.backgroundColor='#aaf'" onmouseout="this.style.backgroundColor=''"><a class="nav-link" href="#" role="button" style="color: white;border:solid 1px white" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-sign-in-alt fa-2x"></i>Login to donate
          </a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="ui/dist/img/c/5.jpg" style="height:520px">
        <div class="carousel-caption d-none d-md-block">
          <h5>A lot of beggers around the streets</h5>
          <p onmouseover="this.style.backgroundColor='#aaf'" onmouseout="this.style.backgroundColor=''"><a class="nav-link" href="#" role="button" style="color: white;border:solid 1px white" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-sign-in-alt fa-2x"></i>Login to donate
          </a></p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  
   
<!--


  the login
-->
<div class="modal fade" id="modal-reg" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color:  rgb(152, 29, 223);">Registration</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-left: 15%;">
        <div class="register-box">
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <img src="ui/dist/img/acc.png" alt="charity system" class="brand-image img-circle elevation-3" style="opacity: 1">
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Full name" id="name" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" id="mail" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" id="passd" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Retype password" id="rpass" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color:#b503fc;border: none;" id="ngo">Register NGO</button>
                  </div>
                  <!-- /.col -->
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color:#b503fc; border: none;" id="rdonor">Register as Donor</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
        
            </div>
            <!-- /.form-box -->
          </div><!-- /.card -->
          </div>
      
</div>
</div>
</div>
</div>

  <div class="modal fade" id="modal-default" style="display: none;">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title" style="color:  rgb(152, 29, 223);">login</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body" style="padding-left: 15%;">
        <div class="login-box">

          <!-- /.login-logo -->
          <div class="card">
          
            <div class="card-body login-card-body">
              <div class="card-header text-center">
                <img src="ui/dist/img/acc.png" alt="charity system" class="brand-image img-circle elevation-3" style="opacity: 1">
              </div>
              <form action="" method="post">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" id="user" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" id="pass" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
              
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #ca03fc;border: none;" id="login" >Sign In</button>
                  </div>
                  <div class="col-8">
                    <a href="ui/forgot-password.html">forgot password</a>
                  </div>
             
                  <!-- /.col -->
                </div>
              </form>
              <!-- /.social-auth-links -->
        
            </div>
            <!-- /.login-card-body -->
          </div>
        
        </div>
</div>
</div>
</div>
</div>



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline" style="width:40%">
      <marquee>
        Donate to help NGOs save lives
      </marquee>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="#">charity group</a>.</strong> All rights reserved.
  </footer>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- Bootstrap 4 -->

<!-- AdminLTE App -->
<script src="ui/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="ui/dist/js/demo.js"></script>

</body>
</html>
<?php
  }
  ?>
