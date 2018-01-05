<?php 
session_start();

if (isset($_SESSION['uid'])) {
	header('location: admin/admindash.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
</head>
<body>
	<buttom style="float: left;"><a href="index.php">Back</a></buttom> 
	<h1 align="center">Admin Login</h1>

	<form action="login.php" method="POST">

	
		<table align="center">
			<tr>
				<td>Username: </td><td><input type="text" name="uname"></td>
			</tr>
			<tr>
				<td>Password: </td><td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
		
	</form>

</body>
</html>

<?php  
require_once("dbcon.php");
if (isset($_POST['login'])) {

$username = $_POST['uname'];
$password = $_POST['pass'];

$query = "SELECT * FROM admin WHERE password = '$password' AND username = '$username'";
$result = mysqli_query($con,$query);
$row = mysqli_num_rows($result);
if ($row < 1) {

	?>
	<script>
		
		alert('Username or Password not Match');
		window.open('login.php','_self');
	</script>

	<?php
}
	else
	{
		$data = mysqli_fetch_assoc($result);
		$id = $data['id'];
		$_SESSION['uid'] = $id;
		header('location: admin/admindash.php');

	}

}
?>





