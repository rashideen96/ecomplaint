<?php 

include('db.php');

if(isset($_POST['cid']))
{
	// Get Dept ID
	$c_id = $_POST['cid'];
	$output = '';
	$sql = "SELECT * FROM complaint_desc WHERE cid = $c_id ORDER BY description";
	$result = mysqli_query($conn, $sql);
	$output = '<option value="">Select Description</option>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '<option value="'.$row['description'].'">'.$row['description'].'</option>';
	}

	echo $output;
}
else
{
	echo 'ops not found...';
}


 ?>