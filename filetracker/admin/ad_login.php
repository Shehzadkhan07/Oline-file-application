<?php
session_start();
include '../_inc/connection.php';

if(isset($_POST['submit']))
{
	$username = mysqli_real_escape_string($con,$_POST['user']);
    $password =mysqli_real_escape_string($con,$_POST['Pass']);

   $sql= "SELECT * FROM  admin where  Ademail ='$username' and Adpassword ='$password' ";
	$query = mysqli_query($con,$sql);

$row=mysqli_num_rows($query);
$frow=mysqli_fetch_assoc($query);
	if($row==1){
	
		$_SESSION['admin']=$frow['id'];

		header('location: index.php');
	   }else{

              $msg= "login failed";
              //header('location:register.php');
	   

      
   }
}



	 
?>

<!DOCTYPE html>
	<?PHP include '../faculty/layouts/header.php';
?>
<body>

<section id="feature">

	<div class="container center-div shadow ">
		<div class="heading text-center text-uppercase text-danger mb-5"><h2> <font color="g">ADMIN LOGIN </font></h2> </div>
		<div class="container row d-flex d-flex-row justify-content-center mb-5">
		<div class="admin-form shadow p-2">
			<?php if(isset($msg)){?>
				<div class="alert alert-warning">
					<?php echo $msg;?>
				</div>

			<?php }?>
			<form action="ad_login.php"  method="post">
				<div class="form-group " >
					<label >ENTER  Email</label>
					<input type="text" name="user" value="" class="form-control" autocomplete="off" required placeholder="Enter admin email">
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
</section>
</body>
</html>

