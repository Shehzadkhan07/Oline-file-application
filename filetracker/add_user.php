<!DOCTYPE html>
<html lang="en">
<head>

     <title>file tracker</title>
<!-- 

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     
     <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" type="text/css" href="logo.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">



     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">File tracker</a>
               </div>

                              <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                       
                         <li><a href="logout.php" class="smoothScroll">Logout</a></li>
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#"><i class="fa fa-phone"></i> 03468070408</a></li>
                    </ul>
                                        <ul class="nav navbar-nav navbar-right">
                      <div class="navbar-brand" class="navbar-inverse"><img src="log.jpg" class="img-responsive logo"></div>  
                     </ul>  

               </div>

          </div>
     </section>


<?php 
include '_inc/connection.php';


?>
<section id="feature">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
                              <h2>ADD USER<small> </small></h2>
                         </div>
                         <form action="add_user.php" method="post" enctype="multipart/form-data">
                         	<div class="row">
                         	
                         		<div class="col-md-6">
                         			<div class="form-group">
                         				<label>User name</label>
										<input type="text" name="uname" value="" class="form-control" autocomplete="off">
                         			</div>
                         		</div>
                         		     <div class="col-md-6">
                         			<div class="form-group">
                         				<label >Email</label>
					<input type="text" name="uemail" value="" class="form-control" autocomplete="off">
			
                         			</div>
                         	      	</div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                             <label >Password</label>
                         <input type="text" name="upass" value="" class="form-control" autocomplete="off">
               
                                        </div>
                                        </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                             <label >Father name</label>
                         <input type="text" name="fname" value="" class="form-control" autocomplete="off">
               
                                        </div>
                                        </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                             <label >CINC</label>
                         <input type="number" name="ucinc" value="" class="form-control" autocomplete="off">
               
                                        </div>
                                        </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                             <label >Phone Number</label>
                         <input type="number" name="uphone" value="" class="form-control" autocomplete="off">
               
                                        </div>
                                        </div>
                         		<div class="col-md-6">
                                     <div class="form-group">
                                             <label >occupation</label>
                         <input type="text" name="occp" value="" class="form-control" autocomplete="off">
               
                                        </div>
                                        </div>
                         		<div class="col-md-12">
                         			<br/>
                         			<button type="submit" name="submit" class="btn btn-success btn-block">Sign Up</button>
                         		</div>

                         	</div>

                         </form>
			</div>
		</div>
	</div>
</section>

<?php include 'layouts/footer.php';?>


<?php

include '../_inc/connection.php';





if(isset($_POST['submit']))   
{
     $uname = mysqli_real_escape_string($con,$_POST['uname']);
    $uEmail =mysqli_real_escape_string($con,$_POST['uemail']);
    $upass =mysqli_real_escape_string($con,$_POST['upass']);
    $ufname =mysqli_real_escape_string($con,$_POST['fname']);
    $ucinc =mysqli_real_escape_string($con,$_POST['ucinc']);
    $uphone =mysqli_real_escape_string($con,$_POST['uphone']);
    $uoccp =mysqli_real_escape_string($con,$_POST['occp']);
          

 $Usql= "INSERT INTO user(User_name, Email, Password, Father_name, Cinc, Phone, occupation) VALUES ('$uname','$uEmail','$upass','$ufname','$ucinc','$uphone','$uoccp')";
 $adquery=mysqli_query($con,$Usql);
}

//if(!$adquery){
//   echo "";
//}else{
      header('location:add_user.php');
        
//}

?>
