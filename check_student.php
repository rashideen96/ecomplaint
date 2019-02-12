<?php 

include('db.php');
if(!empty($_POST['studID']))
{
	// Get Dept ID
	$studID = $_POST['studID'];
	$sql = "SELECT * FROM student WHERE student_no = $studID LIMIT 1";
	$result = mysqli_query($conn, $sql);

	// Extract student data
	while($row = mysqli_fetch_assoc($result))
	{
		$stud_name = $row['student_name'];
	}

	$count_row = mysqli_num_rows($result);
	
	if($count_row == 0)
	{
		?>
        <p style="color: red;"> Student Not Exists .</p>
        <script>$('#submitBtn').prop('disabled',true);</script>
        <?php
	}
	else
	{
		?>
        <p style="color: green;"> Student Exists .</p>
        <script>$('#submitBtn').prop('disabled',false);</script>
        <?php
	}
	
}
else
{
	echo 'Fill in the blank';
	?>
	<script>$('#submitBtn').prop('disabled',true);</script>
	<?php
}

 ?>