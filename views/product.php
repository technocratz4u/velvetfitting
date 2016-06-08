<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
	$productDetails = $model;
?>

<meta name="description" content="Product detail of <?php echo $productDetails["item_name"]?> manufactured by Velvet Fitting - PRIME CREATIONS, largest bathroom fitting manufacturer cum supplier, classy and affordable faucet based out of Delhi, India">
<link rel="canonical" href="<?php echo __APPLICATION_URL."/product"."/".$productDetails["item_name_url_pattern"]."/".$productDetails["item_id"]?>" />

<title><?php echo $productDetails["item_name"]?> | <?php echo $productDetails["category_name"]?> Product | Velvet Fitting Product</title>

<link href="<?php echo __WEB_ROOT?>/static/css/product.css" rel="stylesheet" />

<?php include "header_includes.php"; ?>

<script type="application/ld+json">
	[
	<?php include "json-ld/jsonld_local_business.php"; ?>,
	<?php include "json-ld/jsonld_website.php"; ?>,
	<?php include "json-ld/jsonld_product.php"; ?>,
	<?php include "json-ld/jsonld_item_page.php"; ?> 
	]
</script>

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
						 <a href="javascript:void(0);" onclick ='addToEnquiryList("<?php echo $productDetails["item_name"].' ('.$productDetails["category_name"].')-'.$productDetails["item_code"]?>")'
								class="btn btn-dark"><i class="fa fa-question-circle"></i> Add to
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
		                                <h3><a href="<?php echo __WEB_ROOT."/product/".$itemsCategoryElem["item_url_pattern"]."/".$itemsCategoryElem["item_id"] ?>"><?php echo $itemsCategoryElem["item_name"] ?><br/>(<?php echo $itemsCategoryElem["item_code"] ?>)</a></h3>
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
