<?php session_start();
if(!isset($_SESSION['faculty'])){
	header("Location: login.php");
}
$userid= $_SESSION['faculty'];//for id because the logged in user is stored here
if(isset($_GET['application'])){
	$appid=$_GET['application'];//This is id of application in hand
}else{
	//header("Location: ../404.php");
}
include '../_inc/connection.php';
if(isset($_POST['submit'])){
	$to_id=$_POST['des_id'];
	$remarks=$_POST['remarks'];
	$forsql="INSERT INTO `forwarding`(`application_id`, `from_id`, `remarks`, `to_id`) VALUES ('$appid','$userid','$remarks','$to_id')";
	$forr=mysqli_query($con,$forsql);

	header("Location: view_application.php?application=$appid");

}

$fs="SELECT * FROM forwarding WHERE application_id='$appid' ORDER BY timestamp ASC";
$fr=mysqli_query($con,$fs);


include 'layouts/header.php';
$appsql="SELECT
    faculty.desname,
    department.Dep_name,department.address,
    applications.ID,
    applications.subject,
    applications.date,
    applications.body,
    applications.doc,
    USER.User_name,
    USER.Email,
    USER.Father_name,
    USER.Cinc,
    USER.Phone,
    USER.occupation
FROM
    applications
INNER JOIN USER ON USER.ID = applications.user_id
INNER JOIN faculty ON faculty.id = applications.des_id
INNER JOIN department ON department.ID = faculty.depart_id
WHERE applications.ID='$appid'";
$appr=mysqli_query($con,$appsql);
$approw=mysqli_fetch_assoc($appr);
if(mysqli_num_rows($appr)==0){
	//header("Location: ../404.php");
}

if(!$appr){
  die(mysqli_error($con));
}
$dessql="SELECT 
faculty.id,
faculty.desname,
department.Dep_name
FROM
faculty
INNER JOIN department ON faculty.depart_id = department.ID";
$desr=mysqli_query($con,$dessql);

?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<p>To,<br/>
							<?php echo $approw['desname'];?>,<br/>
							<?php echo $approw['Dep_name'];?>,<br/>
							<?php echo $approw['address'];?>
							Subject: <?php echo $approw['subject'];?></p>
							<p><?php echo $approw['body'];?></p>

						</p>

					</div>
				</div>
			</div>
			<div class="col-md-8">
				<form action="" method="post">
				
						   <div class="form-group">
                         			   <label>Forward To</label> 
                        <select name="des_id" class="form-control" required> <option value="">--Please Select--</option><?php while ($desrow=mysqli_fetch_assoc($desr)) {?>
                            <option value="<?php echo $desrow['id'];?>"><?php echo $desrow['desname'];?> <?php echo $desrow['Dep_name'];?> </option>
                        <?php }?>
                        </select>
                    			</div>
                    			<div class="form-group">
                    				<label>Remarks</label>
                    				<textarea name="remarks" class="form-control"></textarea>
                    			</div>
                    			<input type="submit" name="submit" class="btn btn-block btn-success" value="Forward">
                         		
				</form>
				<h3 class="text-center">History</h3>
				<table class="table">
					<tr>
						<th>From</th>
						<th>To</th>
						<th>Remarks</th>
						<th>Dated</th>
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

						</tr>
					<?php }?>
				</table>
			</div>
		</div>
	</div>


<?php include 'layouts/footer.php';?>