<?php session_start();
//if(!isset($_SESSION['faculty'])){
  //header("Location: login.php");
//}
//$userid= $_SESSION['faculty'];
include '../_inc/connection.php';


include 'layouts/header.php';


$fq="SELECT * FROM faculty ";
$result=mysqli_query($con,$fq);









?>

<section id="feature">
  <div class="container">
  	<div class="row">
      <form>
      <table class="table table-dark"> 		
  			<div class="alert alert-success">
  				 <span class="text-danger"><strong>Faculty</strong></span>  Registration Portal.
  			</div>
          
          <tr>
            <th  bgcolor="yellow" scope="col">ID</th>
            <th bgcolor="yellow" scope="col">Des_NAME</th>
            <th  bgcolor="yellow" scope="col">Email</th>
            <th  bgcolor="yellow" scope="col">Depart_ID</th> 
            <th  bgcolor="yellow" scope="col">Delete</th>
             <th  bgcolor="yellow" scope="col">Update</th>

            
          </tr>
            <?php       

            while ($rows=mysqli_fetch_assoc($result)) { ?>
            
           
                

          <tr>
          
              
                <td scope="row"><?php echo $rows['id'];?></td>
                <td><?php echo $rows['desname'];?></td>
                <td><?php echo $rows['Email'];?></td>
                <td><?php echo $rows['depart_id'];?></td>

                    
                 
                 <td><a href="dele_Faculty.php?id=<?php echo $rows["id"]; ?>"><input type="button" name="submit" class="btn btn-block btn-success" value="Delete"></a></td>
                 <td><input type="button" name="submit" class="btn btn-block btn-success" value="Update"></td>

                              

          </tr>
          <?php } ?>
        </table>
        </form>
  		</div>
  	</div>
  </div>
</section>

<?php include 'layouts/footer.php';?>