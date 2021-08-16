









<!DOCTYPE html>
<html>
<head>
	
<?php

	include 'layouts/header.php';
	include '../_inc/connection.php';


$usql="SELECT * FROM `department` ";
$dr=mysqli_query($con,$usql);









	?>


<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section id="feature">
<div class="container center-div shadow ">
	<form action="addcon.php"  method="POST"   class="container">
		<div class="heading text-center text-uppercase text-danger mb-12 "> ADD FACULTY </div>
		<div class="container row d-flex d-flex-row justify-content-center mb-10">
		<div class="admin-form shadow p-2">
		 
			
				<div class="form-group " >
					<div class="col-md-6">
             	        <label >Destination Name</label>
					    <input type="text" name="desname" value="" class="form-control" autocomplete="off">
			     	</div>
			  </div>
			
				<div class="col-md-6">
				<div class="form-group " >
			         <label >Enter your Email</label>
					<input type="Email" name="demail" value="" class="form-control" autocomplete="off">
			  </div>
			   </div>
			
			       <div class="col-md-6">
			       <div class="form-group " >
			        <label >Enter your passwpord</label>
					<input type="Password" name="dpass" value="" class="form-control" autocomplete="off">
				
                    </div>
                     </div>
                    
                        <div class="col-md-6">	           
                       <div class="form-group">
                       <label>Select department</label> 
                        <select name="dpname" class="form-control" > <option value="">--Please Select--</option><?php while ($drow=mysqli_fetch_assoc($dr)) {?>
                            <option value="<?php echo $drow['ID'];?>"><?php echo $drow['Dep_name'];?></option>
                        <?php }?>
                        </select>
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
