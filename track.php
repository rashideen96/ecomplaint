

<?php 
include('db.php');



 ?>

<?php include('includes/header.php'); ?>
	<?php include('includes/navigation.php'); ?>
	<div class="container">
		
	
	

	<!-- Register complaint -->
	<h1>Track Complaint</h1>
	<hr>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input class="form-control r" type="text" name="trackNo" placeholder="Put Complaint No here.." id="trackNo" autocomplete="off" required>
				</div>
				
				<div class="form-group">
					<input class="btn btn-primary r" type="submit" name="submit" value="Track" id="track">
					
				</div>
			</form>
			<!-- <button type="button" id="print">Print</button> -->

		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div id="data">
				
			</div>
		</div>
	</div>
	
	</div>

<script>
	$(document).ready(function(){
		
		$('#track').on('click', function(e){
			e.preventDefault();
			var trackNo = $('#trackNo').val();
			
			$.ajax({
				url: "fetch_track.php",
				method: "POST",
				data: {trackNo:trackNo},
				dataType: "text",
				success: function(data){
					$('#data').html(data);
				}
			});
		});

		// Print function
		$('.print').on('click', function(){
			//e.preventDefault();
			console.log('click');
		});

		$(document).on('click', '.print', function(){
		    //alert("success");
		    window.print();
		});


	});

</script>	
	
<?php include('includes/footer.php'); ?>