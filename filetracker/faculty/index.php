<?php session_start();
if(!isset($_SESSION['faculty'])){
	header("Location: login.php");
}
$userid= $_SESSION['faculty'];
include '../_inc/connection.php';
$Usql="SELECT 
faculty.id,
faculty.desname,
department.Dep_name
FROM
faculty
INNER JOIN department ON faculty.depart_id = department.ID
WHERE faculty.id='$userid'";
$Ur=mysqli_query($con,$Usql);
$Urow=mysqli_fetch_assoc($Ur);
//print_r($Urow);
$appsql="SELECT
    applications.ID,
    applications.subject,
    applications.date,
    applications.body,
    applications.doc,
 
    user.User_name,
    user.Email,
    user.Father_name,
   user.Cinc,
    user.Phone,
   user.occupation
FROM
    applications

INNER JOIN user ON user.ID = applications.user_id
WHERE applications.des_id='$userid'";
$appr=mysqli_query($con,$appsql);
if(!$appr){
  die(mysqli_error($con));
}


include 'layouts/header.php';?>
<section id="feature">
  <div class="container">
  	<div class="row">
  		<div class="col-md-12">
  			<div class="alert alert-success">
  				Welcome <?php echo $Urow['desname'];?> <?php echo $Urow['Dep_name'];?> to <span class="text-danger"><strong> BKUC</strong></span> Application Registration Portal.
  			</div>
          <h3 class="text-center">Applications to <?php echo $Urow['desname'];?> <?php echo $Urow['Dep_name'];?> </h3>
        <table class="table">
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
              
                <td><?php echo $approw['date'];?></td>
                <td><?php echo $approw['subject'];?></td>
                <td><?php echo $approw['body'];?>
                    <?php if($approw['doc']!=Null){?>
                    <hr>
                    <a  target="_blank" href="../images/<?php echo $approw['doc'];?>">Download Attachment</a>
                  <?php }?>

                  
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