<?php 

include('db.php');

if(isset($_POST['dept_id']))
{
	// Get Dept ID
	$dept_id = $_POST['dept_id'];
	$output = '';
	$sql = "SELECT * FROM location WHERE dept_id = $dept_id ORDER BY name";
	$result = mysqli_query($conn, $sql);
	$output = '<option value="">Select Location</option>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '<option value="'.$row['name'].'">'.$row['name'].'</option>';
	}

	echo $output;
}
else
{
	echo 'ops not found...';
}


 ?>

