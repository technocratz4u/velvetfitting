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

	<div class="container" id="page-container">

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						Inquire <strong>PRIME CREATIONS</strong>
					</h2>
					<hr>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-8 col-md-offset-2">
					<div class="alert alert-danger" role="alert" id="alertMsg" style="display:none;"></div>
					<form id="inquiryFrom" action="<?php echo __WEB_ROOT?>/inquire/submit" method="post">
					  <div class="form-group">
					    <label for="inquiryDetail">Inquiry Details</label>
					    <textarea name="inquiryDetail" class="form-control" rows="7" id="inquiryDetail" placeholder="Details"></textarea>
					  </div>
					  <div class="form-group">
					    <label for="inquiryEmail">Email</label>
					    <input type="email" name="inquiryEmail" class="form-control" id="inquiryEmail" placeholder="Email" maxlength="100">
					  </div>
					  <div class="form-group">
					    <label for="inquiryMobile">Mobile No.</label>
					    <input type="text" name="inquiryMobile" class="form-control" id="inquiryMobile" placeholder="Mobile No." maxlength="15">
					  </div>
					  
					  <a href="javascript:void(0);" id="inquirySubmit" class="btn btn-dark">Submit</a>
					</form>
				</div>
				
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
