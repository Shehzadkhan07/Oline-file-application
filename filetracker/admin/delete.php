<?php
include_once '../_inc/connection.php';
$sql = "DELETE FROM user WHERE ID='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
    header('location: view_users.php');
} else {
    echo "Error deleting record: " . mysqli_error($con,$sql);
}
mysqli_close($con);
?>