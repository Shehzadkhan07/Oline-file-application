<?php

include '../_inc/connection.php';





if(isset($_POST['submit']))	
{
	$dname = mysqli_real_escape_string($con,$_POST['desname']);
    $pEmail =mysqli_real_escape_string($con,$_POST['demail']);
    $pass =mysqli_real_escape_string($con,$_POST['dpass']);
    $dpname =mysqli_real_escape_string($con,$_POST['dpname']);
          





  $sq="INSERT INTO `faculty` (`desname`, `Email`, `Password`, `depart_id`) VALUES ('$dname', '$pEmail', '$pass', '$dpname')";
 $adquery=mysqli_query($con,$sq);
}

if(!$adquery){
	echo "error";
}else{
	 header('location:addfaculty.php');
	   
}

?>
