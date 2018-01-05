<?php 

session_start();
if (isset($_SESSION['uid'])) {
	echo "";
}
else
{
	header('location: ../login.php');
}


 ?>
 <?php  
 	include('header.php');
 	include('titlehead.php');
 ?>
<form action="addstudent.php" method="POST" enctype="multipart/form-data">
	<table border="1px solid black" style="width: 70%" align="center">
	<tr>
		<th>Roll No</th>
		<td><input type="text" name="rollno" placeholder="Enter Roll no" required="required"></td>
	</tr>
	<tr>
		<th>Full Name</th>
		<td><input type="text" name="fullname" placeholder="Enter Name" required="required" ></td>
	</tr>
	<tr>
		<th>City</th>
		<td><input type="text" name="city" placeholder="Enter city" required="required"></td>
	</tr>
	<tr>
		<th>Parents Contact No</th>
		<td><input type="text" name="pcont" placeholder="Enter the contact no of parents" required="required"></td>
	</tr>
	<tr>
		<th>Standerd</th>
		<td><input type="number" name="std" placeholder="Enter Standerd" required="required"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" name="picture" required="required"></td>
	</tr>
	<tr>	
		<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
	</tr>

	</table>


</form>
<?php 
include('../dbcon.php');
if (isset($_POST['submit'])) {
	$rollno = $_POST['rollno'];
	$fullname = $_POST['fullname'];
	$city = $_POST['city'];
	$pcont = $_POST['pcont'];
	$standerd = $_POST['std'];
	$s_image = $_FILES['picture']['name'];
	$tmpname = $_FILES['picture']['tmp_name'];
	$store = "../dataimg/".$s_image;
	move_uploaded_file($tmpname, $store);
	
	$query = "INSERT INTO `student`(`rollno`, `sname`, `city`, `pcont`, `standerd`, `image`) VALUES ('$rollno', '$fullname', '$city', '$pcont', '$standerd', '$s_image')";

	$result = mysqli_query($con,$query);

	if ($result == true) {
		?>
		<script>
			alert('Data Inserted :)');
		</script>
		<?php

		
	}


}

 ?>