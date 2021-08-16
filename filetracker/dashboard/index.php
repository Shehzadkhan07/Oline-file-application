<?php session_start();
if(!isset($_SESSION['user'])){
	header("Location: login.php");
}
$userid= $_SESSION['user'];
include '../_inc/connection.php';
$Usql="SELECT * FROM user WHERE ID='$userid'";
$Ur=mysqli_query($con,$Usql);
$Urow=mysqli_fetch_assoc($Ur);
$appsql="SELECT
    applications.ID,
    applications.subject,
    applications.date,
    applications.body,
    applications.doc,
  department.Dep_name,
    faculty.desname
FROM
    applications
INNER JOIN faculty ON faculty.id = applications.des_id
INNER JOIN department ON department.ID = faculty.depart_id
WHERE applications.user_id = $userid";
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
  				Welcome <?php echo $Urow['User_name'];?> to <span class="text-danger"><strong> BKUC</strong></span> Application Registration Portal.
  			</div>
          <h3 class="text-center">Your Applications</h3>
        <table class="table">
          <tr>
              <th>Dated</th>
            <th>To</th>
            
          
            <th>Subject</th>
            <th>Body</th>
            <th>View</th>
          </tr>
          <tr>
            <?php while($approw=mysqli_fetch_assoc($appr)){?>
              <tr>
                  <td><?php echo $approw['date'];?></td>
                <td><?php echo $approw['desname'];?> <?php echo $approw['Dep_name'];?></td>
           
              
                <td><?php echo $approw['subject'];?></td>
                <td><?php echo $approw['body'];?>
                  <?php if($approw['doc']!=Null){?>
                    <hr>
                    <a  target="_blank" href="../images/<?php echo $approw['doc'];?>">Download Attachment</a>
                  <?php }?>


                </td>
                  <td><a href="view_application.php?application=<?php echo $approw['ID'];?>" class="btn btn-success btn-sm">Track Application</a></td>



              </tr>

            <?php }?>
          </tr>
        </table>
  		</div>
  	</div>
  </div>
</section>

<?php include 'layouts/footer.php';?>