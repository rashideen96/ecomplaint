<?php 

include('db.php');
if (!empty($_POST['trackNo'])) 
{
	$trackNo = (int)$_POST['trackNo'];
	$output = '';
	$sql = "SELECT * FROM complaint WHERE id=$trackNo";
	$result = mysqli_query($conn, $sql);

	// check if ada komplen
	$check = mysqli_num_rows($result);
	if($check == 0)
	{
		echo $output = '<h1>No Komplen</h1>';
	}else{


	$output = '<table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>ID</th>
 			<th>student ID</th>
 			<th>Name</th>
 			<th>Email</th>
 			<th>Phone NO</th>
 			<th>Faculty</th>
 		</tr>
 	</thead>
';
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['id'];
		$studID = $row['studID'];
		$studName = $row['studName'];
		$studEmail = $row['studEmail'];
		$studPhoneNo = $row['studPhoneNo'];
		$dept = $row['dept'];

		$output .= '<tbody>
 		<tr>
 			<td>'.$id.'</td>
 			<td>'.$studID.'</td>
 			<td>'.$studName.'</td>
 			<td>'.$studEmail.'</td>
 			<td>'.$studPhoneNo.'</td>
 			<td>'.$dept.'</td>
 		</tr>
 	</tbody> </table><button type="button" id="print" class="btn btn-primary r print">Print</button>';
	}
	echo $output;
}
}
else
{
	echo "<h4 class='bg-danger'>Error Not found</h4>";
}


 ?>

