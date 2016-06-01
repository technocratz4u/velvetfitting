<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Contact Velvet Fitting - PRIME CREATIONS</title>

<?php include "header_includes.php"; ?>


</head>

<body>

	<?php include "header.php"; ?>
	<?php 
		$restStatus = $model;
		//print_r($homePageDetails);
	?>

	<div class="container" id="page-container">

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						You Like <strong>PRIME CREATIONS</strong>
					</h2>
					<hr>
				</div>
				<div class="clearfix"></div>
				
				<?php 
					if($restStatus["STATUS"]=="SUCCESS"){
				?>
					<div class="col-md-8 col-md-offset-2" style="text-align: center;">
						<div class="alert alert-success" role="alert">Thanks for showing interest. Velvet-Fittings will contact you soon.</div>
						<div class="row">
							<div class="col-lg-12">
								<a href="<?php echo __WEB_ROOT?>/category" class="btn btn-dark" style="margin:20px 0px;">Continue Browsing »</a>
							</div>
						</div>
					</div>
				<?php 	
					}else{
				?>
					<div class="col-md-8 col-md-offset-2" style="text-align: center;">
						<div class="alert alert-danger" role="alert">Something went wrong. Please try again.</div>
						<div class="row">
							<div class="col-lg-12" >
								<a href="<?php echo __WEB_ROOT?>/inquire" class="btn btn-dark" style="margin:20px 0px;">Send Inquiry »</a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
				
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
	<!-- /.container -->


	<?php include "footer.php"; ?>

	<?php include "footer_includes.php"; ?>
	
	<script src="<?php echo __WEB_ROOT?>/static/js/inquire.js"></script>


</body>
</html>
