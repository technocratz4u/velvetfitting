<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Velvet Fitting - PRIME CREATIONS bathroom fitting manufacturer cum supplier, view online catalog of high quality and affordable faucet based out of Delhi, India">

<link rel="canonical" href="<?php echo __APPLICATION_URL?>" />

<title>Bathroom Fitting Manufacturer | Faucet Supplier | Velvet Fitting</title>
	
<?php include "header_includes.php"; ?>

<script type="application/ld+json">
	[
	<?php include "json-ld/jsonld_local_business.php"; ?>,
	<?php include "json-ld/jsonld_website.php"; ?>
	]
</script>

</head>

<body>

	<?php include "header.php"; ?>
	<?php 
		$homePageDetails = $model;
		//print_r($homePageDetails);
	?>
	
	<div class="container" id="page-container">

		<div class="row">
			<div class="box">
				<div class="col-lg-12 text-center">
					<div id="homeCarousel" class="owl-carousel owl-theme">
							     
				      <div class="item"><img class="img-responsive" src="<?php echo __WEB_ROOT?>/static/img/homePageSliders/slide1.jpg" alt="pipe"></div>
				      <div class="item"><img class="img-responsive" src="<?php echo __WEB_ROOT?>/static/img/homePageSliders/slide2.jpg" alt="bathroom"></div>
				      <div class="item"><img class="img-responsive" src="<?php echo __WEB_ROOT?>/static/img/homePageSliders/slide3.jpg" alt="fittings"></div>
				     
				    </div>
					<h2 class="brand-before">
						<small>Welcome to</small>
					</h2>
					<h1 class="brand-name">Velvet Fitting</h1>
					<hr class="tagline-divider">
					<h2>
						<small>By <strong>Prime Creations</strong>
						</small>
					</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						Get to know <strong>Our Products</strong>
					</h2>
					<hr>
					<div class="row">
						<div class="col-sm-6 col-lg-7">
							<p class="box-title"><strong>Faucets</strong></p>
							<p class="product-first-para">Velvet Fitting faucets provide an unmatched experience with their unparalleled quality and performance. 
								Our in-house state of the art design team is completely integrated to produce 60000 faucets per day. 
								Our best in class manufacturing units are backed by a world class testing lab to enable
								Velvet Fitting faucets conform to the highest quality and regulatory standards.</p>
							<p class="product-second-para">Velvet Fitting’s passion for perfection reflects in the 10 years of warranty it extends on its faucets. 
								Our faucets comprise of 29 ranges to suit various design needs ranging from faucets in single-lever, quarter turn and multi-turn operation.</p>
							
							<a href="#" class="btn btn-dark" style="margin:10px 0px 23px 0px;">Read More »</a>
						</div>
						<div class="col-sm-6 col-lg-5">
							<img alt="Faucets" class="img-responsive" id="faucets-img" 
							src="<?php echo __WEB_ROOT?>/static/img/Frisbee-Design-Waterfall-LED-Faucet.jpeg" 
							data-big="<?php echo __WEB_ROOT?>/static/img/Frisbee-Design-Waterfall-LED-Faucet.jpeg" 
							data-big2x="<?php echo __WEB_ROOT?>/static/img/Frisbee-Design-Waterfall-LED-Faucet.jpeg" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						Our products which are <strong>most popular</strong>
					</h2>
					<hr>
					<div id="hot-this-week-carousel" class="owl-carousel">
	                	<?php
	                		if(isset($homePageDetails["hot_this_week"]) && sizeof($homePageDetails["hot_this_week"])>0){
	                			foreach ($homePageDetails["hot_this_week"] as $hotThisWeekDetailsIndex => $hotThisWeekDetailsElem) {
	                	?>
	                		<div class="item">
			                	<div class="product">
			                		<div class="hot-this-week-img-container zoomframe zoomin">
			                			<img src="<?php echo $hotThisWeekDetailsElem["images"]["thumb_url"][__FRONT_IMAGE_NAME] ?>" alt="" class="img-responsive">
			                		</div>
			                		<div class="text">
		                                <a href="<?php echo __WEB_ROOT."/product/".$hotThisWeekDetailsElem["item_url_pattern"]."/".$hotThisWeekDetailsElem["item_id"] ?>"><?php echo $hotThisWeekDetailsElem["item_name"] ?><br/>(<?php echo $hotThisWeekDetailsElem["item_code"] ?>)</a>
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
		
		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						Why <strong>buy from us</strong> ?
					</h2>
					<hr>
					<div class="row" id="buy-from-us-body">
						<div class="col-md-5 buy-from-us-list">
							<ul>
								<li>Easy modes of payment - suitable for all</li>
								<li>Experienced manpower - best in class</li>
								<li>Products of high quality - state of the art</li>
								<li>Rich vendor base - we serve them all</li>
							</ul>
						</div>
						<div class="col-md-2" id="buy-from-us-banner">
							<img class="img-responsive" id="buy-from-us-img" src="<?php echo __WEB_ROOT?>/static/img/kitchen-faucet-bg-pulldowninline.jpg" alt="Why Buy from Us">
						</div>
						<div class="col-md-5 buy-from-us-list">
							<ul>
								<li>Timely deliveries - on time every time</li>
								<li>Transparent dealings - you get what you see</li>
								<li>Wide distribution network - we are always nearby</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container -->


	<?php include "footer.php"; ?>

	<?php include "footer_includes.php"; ?>
	
	<script src="<?php echo __WEB_ROOT?>/static/plugins/jquery-magnify-zoom/jquery.mlens-1.6.min.js"></script>
	
	<script src="<?php echo __WEB_ROOT?>/static/js/home.js"></script>

</body>

</html>
