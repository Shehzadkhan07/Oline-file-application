<?php session_start();
if(!isset($_SESSION['faculty'])){
  header("Location: login.php");
}
$userid= $_SESSION['faculty'];
include '../_inc/connection.php';


include 'layouts/header.php';?>

?>
<section id="feature">
  <div class="container">
  	<div class="row">
  		<div class="col-md-12">
  			<div class="alert alert-success">
  				 <span class="text-danger"><strong>Faculty</strong></span>  Registration Portal.
  			</div>
          
          <tr>
            <th>From</th>
         
            <th>Dated</th>
            <th>Subject</th>
            <th>Body</th>
            <th>View</th>
          </tr>
          <tr>
            <?php while($approw=mysqli_fetch_assoc($appr)){?>
              <tr>
                <td><?php echo $approw['User_name'];?> S/D of <?php echo $approw['Father_name'];?><br/>
                  <small>
                   Email: <?php echo $approw['Email'];?><br/>
                   Phone: <?php echo $approw['Phone'];?><br/>
                   CNIC :  <?php echo $approw['Cinc'];?><br/>


                  </small>

                </td>
                              <td><a href="view_application.php?application=<?php echo $approw['ID'];?>" class="btn btn-success btn-sm">View Application</a></td>



              </tr>

            <?php }?>
          </tr>
        </table>
  		</div>
  	</div>
  </div>
</section>

<?php include 'layouts/footer.php';?>