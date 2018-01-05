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
 <table align="center">
 <form action="deletestudent.php" method="POST">
	<tr>
	<th>Enter Standerd</th> 		
	<td><input type="number" name="standerd" palceholder="Enter Standerd" required="required"></td>
	<th>Enter Student Name</th> 		
	<td><input type="text" name="stdname" placeholder="Enter Student Name" required="required"></td>
	<td><input type="submit" name="submit" value="Search"></td>
	</tr>
	



 </form>
 </table>

 <table align="center" border="1px solid black" width="80%">
 	<tr style="background-color: #000; color: #fff">
 		<th>No</th>
 		<th>Image</th>
 		<th>Name</th>
 		<th>Roll No</th>
 		<th>Delete</th>
 		
 	</tr>



 <?php  
include('../dbcon.php');
if (isset($_POST['submit'])) {
	$std = $_POST['standerd'];
	$name = $_POST['stdname'];
	$query = "SELECT * FROM `student` WHERE `standerd` = '$std' AND `sname` LIKE '%$name%'";
	$result = mysqli_query($con,$query);
		
		if (mysqli_num_rows($result) < 1) 
		{
			echo "<tr><td colspan='6' align= 'center'>No Records Found</td></tr>";
		}
		
		else
		
		{
			$count = 0;
			while ($data = mysqli_fetch_assoc($result)) {
				$count ++;
			?>		
				<tr align="center">
			 		<td><?php echo $count; ?></td>
			 		<td><img src="../dataimg/<?php echo $data['image']; ?>" style = "max-width: 100px;"></td>
			 		<td><?php echo $data['sname']; ?></td>
			 		<td><?php echo $data['rollno']; ?></td>
			 		<td><a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
 				</tr>

			<?php
				}	
		}




}


 ?>
  </table>
