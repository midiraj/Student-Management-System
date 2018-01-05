<?php  
	include('../dbcon.php');
	$id = $_REQUEST['sid'];
	$query = "DELETE FROM `student` WHERE `id` ='$id'";

	$result = mysqli_query($con,$query);

	if ($result == true) {
		
		header('location: admindash.php');
		
	}
else
{
	echo "Error";
}



?>