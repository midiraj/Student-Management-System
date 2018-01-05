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
 	include('../dbcon.php');
 	$sid = $_GET['sid'];
 	$query = "SELECT * FROM `student` WHERE `id`= '$sid'";
 	$result = mysqli_query($con,$query);
 	$data = mysqli_fetch_assoc($result);

 ?>
 <form action="updatedata.php" method="POST" enctype="multipart/form-data">
	<table border="1px solid black" style="width: 70%" align="center">
	<tr>
		<th>Roll No</th>
		<td><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>" required="required"></td>
	</tr>
	<tr>
		<th>Full Name</th>
		<td><input type="text" name="fullname" value="<?php echo $data['sname']; ?>" required="required" ></td>
	</tr>
	<tr>
		<th>City</th>
		<td><input type="text" name="city" value="<?php echo $data['city']; ?>" required="required"></td>
	</tr>
	<tr>
		<th>Parents Contact No</th>
		<td><input type="text" name="pcont" value="<?php echo $data['pcont']; ?>" required="required"></td>
	</tr>
	<tr>
		<th>Standerd</th>
		<td><input type="number" name="std" value="<?php echo $data['standerd']; ?>" required="required"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" name="picture" required="required"></td>
	</tr>
	<tr>	
		<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
		<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
	</tr>

	</table>


</form>