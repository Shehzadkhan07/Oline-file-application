<?php session_start();
if(!isset($_SESSION['faculty'])){
	header("Location: login.php");
}
$userid= $_SESSION['faculty'];
include '../_inc/connection.php';
$fs="SELECT * FROM forwarding WHERE to_id='$userid' ORDER BY timestamp ASC";
$fr=mysqli_query($con,$fs);

include 'layouts/header.php';?>
<section id="feature">
  <div class="container">
  	<div class="row">
  		<div class="col-md-12">
        <h3 class="text-center">Forwarded Applications</h3>
        <table class="table">
          <tr>
            <th>From</th>
            <th>To</th>
            <th>Remarks</th>
            <th>Dated</th>
            <th>View</th>
          </tr>
          <?php while ($frow=mysqli_fetch_assoc($fr)) {
            $from=$frow['from_id'];
            $to=$frow['to_id'];
            $fromsql="SELECT 
faculty.id,
faculty.desname,
department.Dep_name
FROM
faculty
INNER JOIN department ON faculty.depart_id = department.ID
WHERE faculty.id='$from'";
$fromr=mysqli_query($con,$fromsql);
$fro=mysqli_fetch_assoc($fromr);
    $tromsql="SELECT 
faculty.id,
faculty.desname,
department.Dep_name
FROM
faculty
INNER JOIN department ON faculty.depart_id = department.ID
WHERE faculty.id='$to'";
$tromr=mysqli_query($con,$tromsql);
$tro=mysqli_fetch_assoc($tromr);



            ?>
            <tr>
              <td><?php echo $fro['Dep_name'];?>, <?php echo $fro['desname'];?></td>
              <td><?php echo $tro['Dep_name'];?>, <?php echo $tro['desname'];?></td>
              <td><?php echo $frow['remarks'];?></td>
              <td><?php echo $frow['timestamp'];?></td>
              <td><a href="view_application.php?application=<?php echo $frow['application_id'];?>" class="btn btn-success"
          >View</a></td>

            </tr>
          <?php }?>
        </table>
  		</div>
  	</div>
  </div>
</section>

<?php include 'layouts/footer.php';?>