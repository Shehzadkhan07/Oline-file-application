<?php
session_start();
include '../_inc/connection.php';


if(isset($_POST['submit']))
{
	$username = mysqli_real_escape_string($con,$_POST['user']);
    $password =mysqli_real_escape_string($con,$_POST['Pass']);

   $sql= "select * from user where Email ='$username' and Password ='$password' ";
	$query = mysqli_query($con,$sql);

$row=mysqli_num_rows($query);
$frow=mysqli_fetch_assoc($query);
	if($row==1){
	
		$_SESSION['user']=$frow['ID'];
		header('location: index.php');
	   }else{

              $msg= "login failed";
              //header('location:register.php');
	   

      
   }
}


		 
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>File tracker</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/templatemo-style.css">

</head>
<body>
	<div class="container center-div shadow ">
		<div class="heading text-center text-uppercase text-danger mb-5">LOGIN PAGE </div>
		<div class="container row d-flex d-flex-row justify-content-center mb-5">
		<div class="admin-form shadow p-2">
			<?php if(isset($msg)){?>
				<div class="alert alert-warning">
					<?php echo $msg;?>
				</div>

			<?php }?>
			<form action="login.php"  method="post">
				<div class="form-group " >
					<label > Email id</label>
					<input type="text" name="user" value="" class="form-control" autocomplete="off" required>
				</div>

				<div class="form-group">
					<label >Password</label>
					<input type="Password" name="Pass" value=""  class="form-control" autocomplete="off" required>
					</div>
					<input type="submit"  name="submit">

				  
			</form>

			</div>
		</div>
		
	</div>

</body>
</html>

