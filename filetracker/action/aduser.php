<?php

include '../_inc/connection.php';





if(isset($_POST['submit']))	
{
	$uname = mysqli_real_escape_string($con,$_POST['uname']);
    $uEmail =mysqli_real_escape_string($con,$_POST['uemail']);
    $upass =mysqli_real_escape_string($con,$_POST['upass']);
    $ufname =mysqli_real_escape_string($con,$_POST['fname']);
    $ucinc =mysqli_real_escape_string($con,$_POST['ucinc']);
    $uphone =mysqli_real_escape_string($con,$_POST['uphone']);
    $uoccp =mysqli_real_escape_string($con,$_POST['occp']);
          

 $Usql= INSERT INTO `user`(`User_name`, `Email`, `Password`, `Father_name`, `Cinc`, `Phone`, `occupation`) VALUES ('$uname','$uEmail','$upass','$ufname','$ucinc','$uphone','$uoccp');
 $adquery=mysqli_query($con,$Usql);
}

//if(!$adquery){
//	echo "";
//}else{
	 header('location:add_user.php');
	   
//}

?>
