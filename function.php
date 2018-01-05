<?php  

function showdetails($std,$rollno){
		include('dbcon.php');

		$query = "SELECT * FROM `student` WHERE `rollno` = '$rollno' AND `standerd` = '$std'";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result) > 0) {

				$data = mysqli_fetch_assoc($result);
				?>
				<table border="1px solid black" style="width: 50%; margin-top: 20px;" align="center">
					<tr>
						<th colspan="3">Student Details</th>
					</tr>
					<tr>
						<td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style = "max-height: 150px; max-width: 120px; padding-left: 10px"></td>
						<th>Roll No</th>
						<td><?php echo $data['rollno']; ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo $data['sname']; ?></td>
					</tr>
					<tr>
						<th>Standerd</th>
						<td><?php echo $data['standerd']; ?></td>
					</tr>
					<tr>
						<th>Parents Contact No</th>
						<td><?php echo $data['pcont']; ?></td>
					</tr>
					<tr>
						<th>City</th>
						<td><?php echo $data['city']; ?></td>
					</tr>


				</table>

				<?php
					
				}		
		else {
					?>
						<script>
							alert('No student Found');
						</script>
					<?php

				}		




}



?>