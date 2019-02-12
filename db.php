<?php 


$conn = mysqli_connect('localhost', 'root', '', 'hhvm');

if(!$conn)
{
	die('connection failed '.mysqli_error($conn));
	exit();
}
else
{
	//echo 'connected successfully';
}



 ?>
