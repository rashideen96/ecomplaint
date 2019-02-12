<?php 

include('db.php');
if (!empty($_POST['trackNo'])) 
{
	$trackNo = $_POST['trackNo'];
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
 			<th>studID</th>
 		</tr>
 	</thead>
';
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['id'];
		$studID = $row['studID'];
		$output .= '<tbody>
 		<tr>
 			<td>'.$id.'</td>
 			<td>'.$studID.'</td>
 		</tr>
 	</tbody> </table>';
	}
	echo $output;
}
}
else
{
	echo "<h4 class='bg-danger'>Error Not found</h4>";
}


 ?>

