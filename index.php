

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

	<div class="container">
		
	
	

	<!-- Register complaint -->
	<h2>Student complaint form</h2>
	<hr>
	<h2><?= $msg;  ?></h2>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Student ID</label>
					<input class="form-control r" type="number" name="studID" placeholder="Student ID" id="studID" maxlength="11" autocomplete="off">
					<span id="student_check" style="font-size: 12px;"></span>
				</div>
				<div class="form-group">
					<label>Name</label>
					<input class="form-control r" type="text" name="studName" placeholder="Student Name" id="studName" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control r" type="email" name="studEmail" placeholder="example@domain.com" required>
				</div>
				<div class="form-group">
					<label>Phone/Mobile</label>
					<input class="form-control r" type="text" name="studPhoneNo" placeholder="Eg. 0133634357" maxlength="10" required>
				</div>
				<!-- <div class="form-group">
					<label>Department</label>
					<select class="form-control r" name="dept" id="dept" required>
						<option value="">--Select--</option>
						<?= load_faculty();  ?>
						
					</select>
				</div> -->
				<div class="form-group">
					<label>Faculty</label>
					<select class="form-control r" name="dept" id="dept" required>
						
					</select>
				</div>

				<!-- Enable this for online version -->
				<!-- <div class="form-group">
					<label>Location</label>
					<select class="form-control r" name="location" id="loc" required>
						
					</select>
				</div> -->
				<!-- Enable this for offline version -->
				<div class="form-group">
					<label>Location</label>
					<select class="form-control r" name="location" id="location" required>
						
					</select>
				</div>
				<div class="form-group">
					<label>Room No/Floor</label>
					<input class="form-control r" type="text" name="roomNo" placeholder="Eg. B3-3F-U4" maxlength="10" required>
				</div>
				<div class="form-group">
					<label>Complaint type</label>
					<select class="form-control r" name="complaintType" id="compType" required>
						<option value="">--Select--</option>
						<?= load_complaint();  ?>
					</select>
				</div>
				<div class="form-group">
					<label>Complaint description</label>
					<select class="form-control r" name="complaintDesc" id="compDesc" required>
						<option value="">--Select--</option>
						
					</select>
				</div>
				<div class="form-group">
					<label>Complaint priority</label>
					<select class="form-control r" name="complaintPrior" id="prior" required>
						
					</select>
				</div>
				<div class="form-group">
					<label>Available time</label>
					<div class="row">
						<div class="col-lg-6">
							<input class="form-control r" type="text" name="from" placeholder="From" id="from" required>
						</div>
						<div class="col-lg-6">
							<input class="form-control r" type="text" name="to" placeholder="To" id="to" required>
						</div>
					</div>
					
					
				</div>
				<div class="form-group">
					<label>Attachment</label>
					<input type="file" name="file" required>
				</div>
				<div class="form-group">
					<input class="btn btn-primary r" type="submit" name="submit" value="Submit" id="submitBtn">
					<input class="btn btn-primary r" type="reset" name="submit" value="Reset">
				</div>
			</form>
		</div>
	</div>
	
	</div>

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

	$('#compType').on('change', function(){
		var cid = $(this).val();
		$.ajax({
			url: "fetch_description.php",
			method: "POST",
			data: {cid:cid},
			dataType: "text",
			success: function(data){
				$('#compDesc').html(data);
			}
		});
	});

	$('#studID').on('focusout', function(){
		var studID = $(this).val();

		$.ajax({
			url: "check_student.php",
			method: "POST",
			data: {studID:studID},
			dataType: "text",
			success: function(data){
				$('#student_check').html(data);
			}
		});
	});

	$('#from').timepicker({
	    'minTime': '9:00am',
	    'maxTime': '5:00pm',
	    'showDuration': true
	});

	$('#to').timepicker({
	    'minTime': '9:00am',
	    'maxTime': '5:00pm',
	    'showDuration': true
	});

	// Load local json file for faculty
	// Offline version
	$.getJSON("faculty.json", function(data){
		var faculty = '';
		//console.log(data);
		faculty += '<option value="">--Select--</option>';
		$.each(data, function(key, value){
			faculty += '<option value="'+value.name+'">'+value.name+'</option>';
		});

		$('#dept').html(faculty);
	});

	// Load local json file for priority
	// Offline version
	$.getJSON("comp_prior.json", function(data){
		var prior = '';
		//console.log(data);
		prior += '<option value="">--Select--</option>';
		$.each(data, function(key, value){
			prior += '<option value="'+value.name+'">'+value.name+'</option>';
		});

		$('#prior').html(prior);
	});

	// Load local json file for location
	// Offline version
	$.getJSON("location.json", function(data){
		var location = '';
		//console.log(data);
		location += '<option value="">--Select--</option>';
		$.each(data, function(key, value){
			location += '<option value="'+value.name+'">'+value.name+'</option>';
		});

		$('#location').html(location);
	});

	
});
</script>
	
<?php include('includes/footer.php'); ?>