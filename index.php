<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
</head>
<body>

<h3 align="right" style="margin-right: 20px;"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to Student Management System</h1>
<form action="index.php" method="POST">
	<table align="center" style="width: 30%" border="1px solid black">
		<tr>
			<td colspan="2" align="center">Student Information</td>
		</tr>
		<tr>
			<td align="left">Choose Standard</td>
			<td>
				<select name="std" required>
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
				</select>

			</td>
		</tr>
		<tr>
			<td align="left">Enter Rollno</td>
			<td>
				<input type="text" name="rollno">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
		</tr>

	</table>


</form>

</body>
</html>
<?php  
include('dbcon.php');
include('function.php');
if (isset($_POST['submit'])) {

	$std = $_POST['std'];
	$rollno = $_POST['rollno'];

	showdetails($std,$rollno);

}




?>