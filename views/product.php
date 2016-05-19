<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Velvet Fitting - PRIME CREATIONS Products</title>

<link href="<?php echo __WEB_ROOT?>/static/css/product.css" rel="stylesheet" />

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
				<div class="col-md-7 col-sm-6 col-xs-12">
					<div id="mainImage" class="zoomframe zoomin">
						<img
							src="<?php echo $productDetails["images"]["image_url"][__FRONT_IMAGE_NAME]?>"
							alt="" class="img-responsive" id="product-image">
					</div>
				</div>
				<div class="clearfix visible-xs-block"></div>
				<div class="col-xs-12 col-sm-6 col-md-5">
					<h3><?php echo $productDetails["item_name"].' ('.$productDetails["category_name"].')'?></h3>
					<h4><?php echo $productDetails["item_code"]?></h4>
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
				</div>

				<div class="clearfix"></div>
			<div class="row">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						Other products in this <strong><?php echo $productDetails["category_name"]?></strong>
					</h2>
					<hr>
					<div id="category_items_carousel" class="owl-carousel">
	                	<?php
	                		if(isset($productDetails["category_items"]) && sizeof($productDetails["category_items"])>0){
	                			foreach ($productDetails["category_items"] as $itemsCategoryIndex => $itemsCategoryElem) {
	                	?>
	                		<div class="item">
			                	<div class="product">
			                		<div class="hot-this-week-img-container zoomframe zoomin">
			                			<img src="<?php echo $itemsCategoryElem["images"]["thumb_url"][__FRONT_IMAGE_NAME] ?>" alt="" class="img-responsive">
			                		</div>
			                		<div class="text">
		                                <h3><a href="<?php echo __WEB_ROOT."/product/view/".$itemsCategoryElem["item_url_pattern"]."/".$itemsCategoryElem["item_id"] ?>"><?php echo $itemsCategoryElem["item_name"] ?><br/>(<?php echo $itemsCategoryElem["item_code"] ?>)</a></h3>
		                            </div>
			                	</div>
			                </div>
	                	<?php		
	                			}
	                		}
						?>
		              </div>
			</div>
		</div>
			</div>

		</div>

	</div>
	<!-- /.container -->


	<?php include "footer.php"; ?>

	<?php include "footer_includes.php"; ?>
	
	<script src="<?php echo __WEB_ROOT?>/static/js/product.js"></script>


</body>
</html>
