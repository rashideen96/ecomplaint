<?php 
include('db.php');
if(!empty($_POST['description']))
{
	$desc = $_POST['description'];
	$subj = $_POST['subject'];
	$type = "bug";

	$sql = mysqli_query($conn, "INSERT INTO suggestion (subject, description, type) VALUES('$subj', '$desc', '$type')");
	if(!$sql)
	{
		die('query failed'.mysqli_error($conn));
	} 
	else{
		echo "success";
	}
}else
{
	echo "Fill in the blank";
}


 ?>