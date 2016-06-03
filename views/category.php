<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<?php 
	if (isset($model)){
		$categoryPageDetails = $model;
	}
?>

<?php 
	if (isset($categoryPageDetails["selected_sub_category_id"])){
?>
	<link rel="canonical" href="<?php echo __APPLICATION_URL."/category"."/".$categoryPageDetails["selected_sub_category_url_pattern"]."/".$categoryPageDetails["selected_sub_category_id"]?>" />
<?php		
	}else{
?>
	<link rel="canonical" href="<?php echo __APPLICATION_URL?>/category" />
<?php		
	}
?>
<title>Velvet Fitting - PRIME CREATIONS product category</title>

<?php include "header_includes.php"; ?>


</head>

<body>

	<?php include "header.php"; ?>
	
	<!-- Home page content start -->

	<div class="container" id="page-container">
		<input type="hidden" id="selectedSubCategoryId" value="<?php echo isset($model) ? $categoryPageDetails["selected_sub_category_id"] : "" ?>" />
		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						Our <strong>Product Categories</strong>
					</h2>
					<hr>
					<div class="row">
						<div class="col-xs-6 col-sm-4 col-md-3">
							<ul class="category-list">
								<?php 
									if (isset($categoryPageDetails["category_details"]) && isset($categoryPageDetails["category_details"]["4"]) &&
											isset($categoryPageDetails["category_details"]["4"]["sub_category_details"]) && 
											sizeof($categoryPageDetails["category_details"]["4"]["sub_category_details"]) > 0){
										$subCategoryDetailCount=0;
										foreach ($categoryPageDetails["category_details"]["4"]["sub_category_details"] as $subCategoryDetailIndex => $subCategoryDetailElem) {
								?>
								<li class="<?php echo $subCategoryDetailCount==0 ? "first-subctgr" : "" ?>"><a id="<?php echo "subctgr_".$subCategoryDetailElem["sub_category_id"] ?>"
									href="<?php echo __WEB_ROOT."/category/".$subCategoryDetailElem["sub_category_url_pattern"]."/".$subCategoryDetailElem["sub_category_id"] ?>"> &raquo; <?php echo $subCategoryDetailElem["sub_category_name"] ?></a></li>
								<?php
											$subCategoryDetailCount++;
										}
									}
								?>
							</ul>
						</div>
						<div class="col-xs-6 col-sm-8 col-md-9">
							<div class="row">
								<?php 
								if(!isset($categoryPageDetails["selected_sub_category_id"]) && 
										isset($categoryPageDetails["category_details"]["4"]["sub_category_details"]) &&
										sizeof($categoryPageDetails["category_details"]["4"]["sub_category_details"]) > 0){
									$subCategoryDetailCount = 0;
									foreach ($categoryPageDetails["category_details"]["4"]["sub_category_details"] as $subCategoryDetailIndex => $subCategoryDetailElem){
								?>
									<div class="col-xs-12 col-sm-6 col-md-4" id="category-list-container">
										<div class="item">
						                	<div class="product">
						                		<div class="hot-this-week-img-container zoomframe zoomin">
						                			<img src="<?php echo $subCategoryDetailElem["images"]["thumb_url"][__FRONT_IMAGE_NAME] ?>" alt="" class="img-responsive">
						                		</div>
						                		<div class="text">
					                                <h3><a href="<?php echo __WEB_ROOT."/category/".$subCategoryDetailElem["sub_category_url_pattern"]."/".$subCategoryDetailElem["sub_category_id"] ?>"><?php echo $subCategoryDetailElem["sub_category_name"] ?></a></h3>
					                            </div>
						                	</div>
						                </div>
									</div>
									
									<div class="clearfix visible-xs-block"></div>
			                        <?php 
										if (($subCategoryDetailCount+1)%2==0){
									?>
			                        	<div class="clearfix visible-sm-block"></div>
			                        <?php
										}
									?>
			                        <?php 
										if (($subCategoryDetailCount+1)%3==0){
									?>
			                        	<div class="clearfix visible-md-block visible-lg-block"></div>
			                        <?php
										}
									?>

								<?php
										$subCategoryDetailCount++;
									}
								}else if(isset($categoryPageDetails["selected_sub_category_id"]) && 
										isset($categoryPageDetails["category_details"]["4"]["sub_category_details"][$categoryPageDetails["selected_sub_category_id"]]["item_details"]) &&
										sizeof($categoryPageDetails["category_details"]["4"]["sub_category_details"][$categoryPageDetails["selected_sub_category_id"]]["item_details"]) > 0){
									
									foreach ($categoryPageDetails["category_details"]["4"]["sub_category_details"][$categoryPageDetails["selected_sub_category_id"]]["item_details"] as $itemDetailIndex => $itemDetailElem){
								?>
									<div class="col-xs-12 col-sm-6 col-md-4" id="category-list-container">
										<div class="item">
						                	<div class="product">
						                		<div class="hot-this-week-img-container zoomframe zoomin">
						                			<img src="<?php echo $itemDetailElem["images"]["thumb_url"][__FRONT_IMAGE_NAME] ?>" alt="" class="img-responsive">
						                		</div>
						                		<div class="text">
					                                <h3><a href="<?php echo __WEB_ROOT."/product/".$itemDetailElem["item_url_pattern"]."/".$itemDetailElem["item_id"] ?>"><?php echo $itemDetailElem["item_name"] ?><br/>(<?php echo $itemDetailElem["item_code"] ?>)</a></h3>
					                            </div>
						                	</div>
						                </div>
									</div>
									
									<div class="clearfix visible-xs-block"></div>
			                        <?php 
										if (($itemDetailIndex+1)%2==0){
									?>
			                        	<div class="clearfix visible-sm-block"></div>
			                        <?php
										}
									?>
			                        <?php 
										if (($itemDetailIndex+1)%3==0){
									?>
			                        	<div class="clearfix visible-md-block visible-lg-block"></div>
			                        <?php
										}
									?>
								
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


	</div>
	<!-- /.container -->


	<?php include "footer.php"; ?>

	<?php include "footer_includes.php"; ?>

	<script src="<?php echo __WEB_ROOT?>/static/js/category.js"></script>
</body>
</html>
