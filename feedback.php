<?php include('includes/header.php'); ?>
	<?php include('includes/navigation.php'); ?>

	<div class="container">
		<br>
		<br>
		<div class="row">
			<div class="col-lg-2">
				<ul class="list-group r">
				  <li class="list-group-item r"><a href="feedback.php?p=suggestion">Suggestion</a></li>
				  <li class="list-group-item r"><a href="feedback.php?p=bug">Bug</a></li>
				</ul>
			</div>
			<div class="col-lg-10">
				<?php 

				if (isset($_GET['p'])) {
					$page = $_GET['p'];

					switch ($page) 
					{
						case 'suggestion':
							include('suggestion.php');
							break;
						
						case 'bug':
							include('bug.php');
							break;

						default:
							include('suggestion.php');
							break;
					}
				}



				 ?>
				
			</div>
		</div>
	</div>






<?php include('includes/footer.php'); ?>	