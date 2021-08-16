









<!DOCTYPE html>
<html>
<head>
	


<?php


	include 'layouts/header.php';
	include '../_inc/connection.php';




if(isset($_POST['submit']))	
{
	  $dname = mysqli_real_escape_string($con,$_POST['depname']);
    $dadd =mysqli_real_escape_string($con,$_POST['depadd']);
    
            

  $dq="INSERT INTO `department`(`Dep_name`, `address`) VALUES ('$dname','$dadd')";
  $depquery=mysqli_query($con,$dq);
}

##if(! $depquery){
	#echo "error";
#}else{
#	 header('location:add_depart.php');
	   
#}

?>












<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section id="feature">
<div class="container center-div shadow ">
	<form action="add_depart.php"  method="POST"   class="container">
		<div class="heading text-center text-uppercase text-danger mb-12 "> ADD Departments</div>
		<div class="container row d-flex d-flex-row justify-content-center mb-10">
		<div class="admin-form shadow p-2">
		 
			
				<div class="form-group " >
					<div class="col-md-6">
             	        <label >Department Name</label>
					    <input type="text" name="depname" value="" class="form-control" autocomplete="off">
			     	</div>
			  </div>
			
				<div class="col-md-6">
				<div class="form-group " >
			         <label >Enter depart Address</label>
					<input type="text" name="depadd" value="" class="form-control" autocomplete="off">
			  </div>
			   </div>
			
			   


                    <div class="col-md-12">
                     <div class="form-group ">
				
					<input type="submit" class="btn btn-success btn-block" name="submit"  value="INSERT ">
				</div>
			</div>


			</div>
			</form>

			</div>
		</div>
		</div>
	</section>
</body>
</html>
