<?php  
	if (isset($_POST['submit'])) {
	
	include('../dbcon.php');
	$rollno = $_POST['rollno'];
	$fullname = $_POST['fullname'];
	$city = $_POST['city'];
	$pcont = $_POST['pcont'];
	$standerd = $_POST['std'];
	$sid = $_POST['sid'];
	$s_image = $_FILES['picture']['name'];
	$tmpname = $_FILES['picture']['tmp_name'];
	$store = "../dataimg/".$s_image;
	move_uploaded_file($tmpname, $store);
	
	$query = "UPDATE `student` SET `rollno` = '$rollno', `sname` = '$fullname', `city` = '$city', `pcont` = '$pcont', `standerd` = '$standerd', `image` = '$s_image' WHERE `id` = $sid;";

	$result = mysqli_query($con,$query);

	if ($result == true) {
		
		header('location: admindash.php');
		
	}
else
{
	echo "Error";
}


}
?>