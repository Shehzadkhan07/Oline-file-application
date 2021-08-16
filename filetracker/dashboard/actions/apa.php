<?php session_start();
if(!isset($_SESSION['user'])){
	header("Location: ../login.php");
}
include '../../_inc/connection.php';
$fielData = pathinfo(basename($_FILES['image']['name']));
$FileName = uniqid() . '_' . $fielData['extension'];
$image = $_FILES['image']['name'];
$newname = rand(100 , 500).basename($image);
$targetfile = "../../images/" . $newname;

		
     	$user=mysqli_real_escape_string($con,$_SESSION['user']);
     	$sub=mysqli_real_escape_string($con,$_POST['subject']);
     	$date=mysqli_real_escape_string($con,$_POST['Date']);
     	$body=mysqli_real_escape_string($con,$_POST['body']);
     	$des=mysqli_real_escape_string($con,$_POST['des_id']);
if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetfile)){
     	echo $sql="INSERT INTO `applications`(  `user_id`, `subject`, `date`, `body`, `doc`, `des_id`) VALUES ('$user','$sub','$date','$body','$newname','$des')";
     	$result=mysqli_query($con,$sql);
     	if(!$result){
     		die(mysqli_error($con));
     	}else{
     		$_SESSION['succ']="Thanks for your input we will get back to you";
     		header("Location: ../index.php");
     	}
}else{
echo $sql="INSERT INTO `applications`(  `user_id`, `subject`, `date`, `body`, `doc`, `des_id`) VALUES ('$user','$sub','$date','$body',NULL,'$des')";
          $result=mysqli_query($con,$sql);
          if(!$result){
               die(mysqli_error($con));
          }else{
               $_SESSION['succ']="Thanks for your input we will get back to you";
               header("Location: ../index.php");
          }
}