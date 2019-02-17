<form action="" method="post" id="form">
	<div id="message"></div>
	<div class="form-group">
		<label>Subject</label>
		<input type="text" name="subject" class="form-control r" id="subject">
	</div>
	<div class="form-group">
		<label>Description</label>
		<textarea name="description" class="form-control r" id="description"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" id="submit" class="btn btn-default r" value="Submit">
		<input type="reset" name="reset" id="reset" class="btn btn-default r" value="Reset">
	</div>
</form>

<script>
	$(document).ready(function(){

		setTimeout(function(){
		    $('#message').fadeOut();
		},5000);

		$('#submit').on('click', function(e){
			e.preventDefault();

			var description = $('#description').val();
			var subject = $('#subject').val();

			if(description == "" || subject == "")
			{
				$('#message').html('Fill up the form');
			} else{

			

			$.ajax({

				url: "feedback_bug.php",
				method: "POST",
				data: {
					description: description,
					subject:subject
				},
				dataType: "text",
				success: function(data){
					$('#message').html(data);
					$('#form').trigger("reset");
				},
				error: function(err){
					console.log(err);
				}

			});
		}
		});
	});
</script>	