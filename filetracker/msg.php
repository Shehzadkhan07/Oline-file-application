
<?php

include '_inc/connection.php';





if(isset($_POST['send']))   
{
     $Yname = mysqli_real_escape_string($con,$_POST['yname']);
     $YEmail =mysqli_real_escape_string($con,$_POST['yemail']);
     $Ymsg =mysqli_real_escape_string($con,$_POST['ymessage']);
    

 $Msql= "INSERT INTO `contect`(`Yname`, `Yemail`, `YMesage`) VALUES (' $Yname','$YEmail','$Ymsg')";
 $adquery=mysqli_query($con,$Msql);
}

if(!$adquery){
  echo "Samething wrong";
}else{
      header('location:index.php');
        
}

?>
