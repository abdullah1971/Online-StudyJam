<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1" >
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,300italic' rel='stylesheet' type='text/css'>
        <link href="bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
        <link href="js/scriptjava.js">
       <title> Login |Online StudyJam </title>    
        
        
        <script src="bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.min.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    
    <body >
    <div id="logo-with-search-box">
        <div class="container-fluid site-logo-with-search-box">
            <div class="row">
                <div class="col-sm-7 ">
                    <img  id="site-logo"  src="images/StudyJamLogo-04.png" alt="logo">
                </div>

                <div class="col-sm-4">
                   
                   <div class="input-group home-page-search-box-and-logo">
                      <input type="text" class="form-control" id="home-page-search-box" placeholder="search" aria-describedby="search-icon">
                      
                      <span class="input-group-btn">
                        <button class="btn btn-success" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </span>
                      
                      
                   </div>
                    
                </div>
                
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    
    
    
    <!--navigation-bar
       ================= -->
       
       <nav class="navbar  navbar-color navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-position" id="toggle-navbar">
              <ul class="nav navbar-nav">
                <li class=""><a href="index.html">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="catagory-page-1.html">Catagory</a></li>
                <li><a href="community-page-01.html">Community</a></li>
                <li><a href="StudyJam.github.io/index.html">About</a></li>
                
              </ul>
              
              <ul class="nav navbar-nav navbar-right">
                <!--<button type="button" class="btn btn-default">Default</button>-->
                
                <div class="dropdown">
                  <button class="user-profile-dropdown-icon btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                    <span><i class="fa fa-caret-down fa-2x" aria-hidden="true"></i></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">View Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Log Out</a></li>
                    
                  </ul>
                </div>
                
                
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        
        
      <div class="bd">
          
        <div class="container con">
             
             <form  action="login.php" method="post" class="form-horizontal frm" role="form">
                 <h1 class="log-header">Login</h1>
                 <div class="form-group fmgp">
                     <div class="col-sm-10">
                         <input class="form-control use-input" name="user" type="text" value="" placeholder="Username" required="required">
                     </div>
                 </div>
                 <div class="form-group fmgp">
                      <div class="col-sm-10">
                         <input class="form-control use-input" name="pass"  type="password" value="" placeholder="Password" required="required">
                     </div>
                 </div>
                 <div class="form-group fmgp">
                      <div class="col-sm-10">
                          <button  type="submit" name="login" class="btn-lg btn-success logbuttonin">    Login    </button>
                     </div>
                 </div>
                 <div class="form-group fmgp">
                     <div class="col-sm-10">
                       <p class="para">Yet not registered?</p>
                       <button  class="btn btn-sm signup-button" type="button" > Sign up! </button>   
                     </div>
                 
                 </div>
            </form>
        </div>
          
       </div> 
        <div class="main-footer">
                     <footer class="footer-log"> 
                        <div class="footer-copy-log">
                            <ul>
                             <a>@Copyright 2016 , Learn iT</a>
                            </ul>   
                        </div>
                    </footer>
         </div>
    </body>
</html>


<?php

$user='root';
$pass='';
$server='localhost';
$dbname='myportfolio';

$con=new mysqli($server,$user,$pass,$dbname);

if($con->connect_error)
{
    die("connection failed".$con->connect_error);
    
}
else{
   // echo "Connected";
    if(isset($_POST['login']))
    {
        $user_form= mysqli_real_escape_string($con,$_POST['user']);
        $pass_form= mysqli_real_escape_string($con,$_POST['pass']);
        $sel_user= "select * from login where user='$user_form' and pass='$pass_form' ";
        $run_user= mysqli_query($con,$sel_user);
        $check_user= mysqli_num_rows($run_user);
        if($check_user>0)
        {
            $_SESSION['user']=$user_form;
           
             echo "<script> window.open('studentProfile-default.html','_self') </script>";
            
        }
        else
        {
            echo " <script>alert('Username or Password is not correct,try again later!') </script>";
        }
    }
    
    
    
    
    }

?>