

<?php 
include('db.php');
function load_faculty()
{
	global $conn;
	$output = '';
	$sql = "SELECT * FROM faculty ORDER BY id ASC";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	return $output;
}

function load_complaint()
{
	global $conn;
	$output = '';
	$sql = "SELECT * FROM complaint_type ORDER BY complaint_name";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$output .= '<option value="'.$row['id'].'">'.$row['complaint_name'].'</option>';
	}
	return $output;
}

$msg = "";
if(isset($_POST['submit']))
{
	$studID = $_POST['studID'];
	$studName = $_POST['studName'];
	$studEmail = $_POST['studEmail'];
	$studPhoneNo = $_POST['studPhoneNo'];
	$dept = $_POST['dept'];
	$location = $_POST['location'];
	$roomNo = $_POST['roomNo'];
	$complaintType = $_POST['complaintType'];
	$complaintDesc = $_POST['complaintDesc'];
	$complaintPrior = $_POST['complaintPrior'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$availableTime = $from . ' to '.$to;

	$file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];

	if(move_uploaded_file($file_temp, "./uploads/{$file_name}"))
	{
		$sql = "INSERT INTO complaint(studID, studName, studEmail, studPhoneNo, dept, location, roomNo, complaintType, complaintDesc, complaintPrior, availableTime, img) VALUES('$studID', '$studName', '$studEmail', '$studPhoneNo', '$dept', '$location', '$roomNo', '$complaintType', '$complaintDesc', '$complaintPrior', '$availableTime', '$file_name')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			die('query failed'.mysqli_error($conn));
		}
		else
		{
			$lastID = mysqli_insert_id($conn);
			$msg = "Complaint submitted. Your ID is ".$lastID;
		}
	}
}

 ?>

<?php include('includes/header.php'); ?>
	<?php include('includes/navigation.php'); ?>

	<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>E-Tracking Complaint System</h1>
        <p>E-tracking complaint system is system to track every complaint submitted and processod the complaint, user can view their status of complaint their submitted..</p>
        <p><a class="btn btn-primary btn-lg r" href="staff_form.php" role="button">Register Complaint &raquo;</a></p>
      </div>
    </div>

	<div class="container">
		
	
	

	

<script>
$(document).ready(function(){
	// $('#dept').on('change', function(){
	// 	var dept_id = $(this).val();
	// 	$.ajax({
	// 		url: "fetch_location.php",
	// 		method: "POST",
	// 		data: {dept_id:dept_id},
	// 		dataType: "text",
	// 		success: function(data){
	// 			$('#loc').html(data);
	// 		}
	// 	});
	// });

	// $('#compType').on('change', function(){
	// 	var cid = $(this).val();
	// 	$.ajax({
	// 		url: "fetch_description.php",
	// 		method: "POST",
	// 		data: {cid:cid},
	// 		dataType: "text",
	// 		success: function(data){
	// 			$('#compDesc').html(data);
	// 		}
	// 	});
	// });

	// $('#studID').on('focusout', function(){
	// 	var studID = $(this).val();

	// 	$.ajax({
	// 		url: "check_student.php",
	// 		method: "POST",
	// 		data: {studID:studID},
	// 		dataType: "text",
	// 		success: function(data){
	// 			$('#student_check').html(data);
	// 		},
	// 		error: function(err){
	// 			console.log(err);
	// 		}
	// 	});
	// });

	// $('#from').timepicker({
	//     'minTime': '9:00am',
	//     'maxTime': '5:00pm',
	//     'showDuration': true
	// });

	// $('#to').timepicker({
	//     'minTime': '9:00am',
	//     'maxTime': '5:00pm',
	//     'showDuration': true
	// });

	// // Load local json file for faculty
	// // Offline version
	// $.getJSON("faculty.json", function(data){
	// 	var faculty = '';
	// 	//console.log(data);
	// 	faculty += '<option value="">--Select--</option>';
	// 	$.each(data, function(key, value){
	// 		faculty += '<option value="'+value.name+'">'+value.name+'</option>';
	// 	});

	// 	$('#dept').html(faculty);
	// });

	// // Load local json file for priority
	// // Offline version
	// $.getJSON("comp_prior.json", function(data){
	// 	var prior = '';
	// 	//console.log(data);
	// 	prior += '<option value="">--Select--</option>';
	// 	$.each(data, function(key, value){
	// 		prior += '<option value="'+value.name+'">'+value.name+'</option>';
	// 	});

	// 	$('#prior').html(prior);
	// });

	// // Load local json file for location
	// // Offline version
	// $.getJSON("location.json", function(data){
	// 	var location = '';
	// 	//console.log(data);
	// 	location += '<option value="">--Select--</option>';
	// 	$.each(data, function(key, value){
	// 		location += '<option value="'+value.name+'">'+value.name+'</option>';
	// 	});

	// 	$('#location').html(location);
	// });


});
</script>
	
<?php include('includes/footer.php'); ?>