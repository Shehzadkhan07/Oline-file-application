<?php session_start();
//if(!isset($_SESSION['faculty'])){
  //header("Location: login.php");
//}
//$userid= $_SESSION['faculty'];
include '../_inc/connection.php';


include 'layouts/header.php';


$fq="SELECT * FROM user ";
$result=mysqli_query($con,$fq);









?>

<section id="feature">
  <div class="container">
  	<div class="row">

      <table class="table table-dark"> 		
  			<div class="alert alert-success">
  				 <span class="text-danger"><strong>Users</strong></span>  Registration Portal.
  			</div>
          
          <tr>
            <th  bgcolor="yellow" scope="col">ID</th>
            <th bgcolor="yellow" scope="col">User_name</th>
            <th  bgcolor="yellow" scope="col">Email</th>
            <th  bgcolor="yellow" scope="col">Father_name</th>
            <th  bgcolor="yellow" scope="col">Cinc</th>
            <th  bgcolor="yellow" scope="col">Phone</th>
            <th  bgcolor="yellow" scope="col">occupation</th> 
            <th  bgcolor="yellow" scope="col">Delete</th>
             <th  bgcolor="yellow" scope="col">Update</th>

            
          </tr>
            <?php       

            while ($rows=mysqli_fetch_assoc($result)) { ?>
            
           
                

          <tr>
        
              
                <td scope="row"><?php echo $rows['ID'];?></td>
                <td><?php echo $rows['User_name'];?></td>
                <td><?php echo $rows['Email'];?></td>
                <td><?php echo $rows['Father_name'];?></td>
                <td><?php echo $rows['Cinc'];?></td>
                <td><?php echo $rows['Phone'];?></td>
                <td><?php echo $rows['occupation'];?></td>

                
  
                 <td><a href="delete.php?id=<?php echo $rows["ID"]; ?>"><input type="button" name="submit" class="btn btn-block btn-success" value="Delete"></a></td>
                 <td><input type="button" name="submit" class="btn btn-block btn-success" value="Update"></td>

                              

          </tr>
          <?php } ?>
        </table>
  		</div>
  	</div>
  </div>
</section>

<?php include 'layouts/footer.php';?>