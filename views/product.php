<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Velvet Fitting - PRIME CREATIONS Products</title>

<?php include "header_includes.php"; ?>
	<?php
	$productDetails = $model;
	?>

</head>

<body>

	<?php include "header.php"; ?>
	
	<div class="container" id="page-container">

		<div class="row">
			<div class="box">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<div id="mainImage" class="zoomframe zoomin">
						<img
							src="<?php echo $productDetails["images"]["image_url"][__FRONT_IMAGE_NAME]?>"
							alt="" class="img-responsive" id="product-image">
					</div>
				</div>
				<div class="clearfix visible-xs-block"></div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<h3><?php echo $productDetails["item_name"].' ('.$productDetails["category_name"].')'?></h3>
					<h4><?php echo $productDetails["item_code"]?></h4>
					<p>&nbsp;</p>
					<p> <?php echo $productDetails["description"]?><a href="#details"
							id="goTo"><i><small>...View More</small></i></a>
					</p>
					<p>&nbsp;</p>
					<hr>
					<div class="media">
						<div class="media-body">
						 <a href='javascript:addToCart(<?php echo $productDetails["item_name"]?>);'
								class="btn btn-dark"><i class="fa fa-shopping-cart"></i> Add to
								Enquiry List</a>
							<p>&nbsp;</p>
							<p>Show it to your friends</p>
							<p>
								<a href="#" class="external facebook" data-animate-hover="pulse"><i
									class="fa fa-facebook"></i></a> <a href="#"
									class="external gplus" data-animate-hover="pulse"><i
									class="fa fa-google-plus"></i></a> <a href="#"
									class="external twitter" data-animate-hover="pulse"><i
									class="fa fa-twitter"></i></a> <a href="#" class="email"
									data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
							</p>
						</div>
					</div>
					<p>&nbsp;</p>
					<hr class="hidden-md hidden-lg">
				</div>

				<div class="clearfix"></div>
				<div class="row" id="details">
					<div class="col-xs-12 col-md-8">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr id="info">
										<th colspan="2">Additional Information</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Description</td>
										<td><?php echo $productDetails["description"]?></td>
									</tr>
									<tr>
										<td>Item Code</td>
										<td><?php echo $productDetails["item_code"]?></td>
									</tr>
									<tr>
										<td>Series Name</td>
										<td><?php echo $productDetails["category_name"]?></td>
									</tr>

								</tbody>
							</table>

						</div>
					</div>
					<div class="clearfix visible-xs-block"></div>
					<div class="col-xs-12 col-md-4"></div>
				</div>
			</div>

		</div>

	</div>
	<!-- /.container -->


	<?php include "footer.php"; ?>

	<?php include "footer_includes.php"; ?>


</body>
</html>
