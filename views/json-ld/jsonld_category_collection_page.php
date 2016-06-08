<?php
	$categoryPageDetails = $model;
?>

	{
	    "@context": "http://schema.org",
	    "@type": "CollectionPage",
	    "name": "Online catalog of Velvet Fitting - PRIME CREATIONS",
	    "description": "Online catalog of Velvet Fitting - PRIME CREATIONS, the largest bathroom fitting manufacturer cum supplier, classy and affordable faucet based out of Delhi, India",
	    "url": "<?php echo __APPLICATION_URL."/category"?>",
		"image": "http://www.example.com/images/logo.png",
		<?php 
			if (isset($categoryPageDetails["selected_sub_category_id"])){
		?>
			"mainEntity": {
				"@type": "Thing",
				"name": "<?php echo $categoryPageDetails["selected_sub_category_name"] ?>",
				"description": "<?php echo $categoryPageDetails["selected_sub_category_name"] ?> of bathroom fitting/faucet manufactured by Velvet Fitting - PRIME CREATIONS, the largest bathroom fitting manufacturer cum supplier based out of Delhi, India",
				"url": "<?php echo __APPLICATION_URL."/category/".$categoryPageDetails["selected_sub_category_url_pattern"]."/".$categoryPageDetails["selected_sub_category_id"] ?>",
				"image": "<?php echo __APPLICATION_URL.$categoryPageDetails["selected_sub_category_images"]["image_url"][__FRONT_IMAGE_NAME]?>"
			},
		<?php 
			}
		?>
		"mentions": [
		
			<?php 
				if (isset($categoryPageDetails["category_details"]) && isset($categoryPageDetails["category_details"]["4"]) &&
						isset($categoryPageDetails["category_details"]["4"]["sub_category_details"]) && 
						sizeof($categoryPageDetails["category_details"]["4"]["sub_category_details"]) > 0){
					$subCategoryDetailCount=0;
					foreach ($categoryPageDetails["category_details"]["4"]["sub_category_details"] as $subCategoryDetailIndex => $subCategoryDetailElem) {
			?>
				<?php
					if($subCategoryDetailCount>0){
				?>
					,
				<?php
					}
				?>
				{
					"@type": "Thing",
					"name": "<?php echo $subCategoryDetailElem["sub_category_name"] ?>",
					"description": "<?php echo $subCategoryDetailElem["sub_category_name"] ?> of bathroom fitting/faucet manufactured by Velvet Fitting - PRIME CREATIONS, the largest bathroom fitting manufacturer cum supplier based out of Delhi, India",
					"url": "<?php echo __APPLICATION_URL."/category/".$subCategoryDetailElem["sub_category_url_pattern"]."/".$subCategoryDetailElem["sub_category_id"] ?>",
					"image": "<?php echo __APPLICATION_URL.$subCategoryDetailElem["images"]["image_url"][__FRONT_IMAGE_NAME]?>"
				}
			<?php
						$subCategoryDetailCount++;
					}
				}
			?>
		
		],
	    "breadcrumb": {
	        "@type": "BreadcrumbList",
	        "itemListElement": [{
	            "@type": "ListItem",
	            "position": 1,
	            "item": {
	                "@id": "<?php echo __APPLICATION_URL?>",
	                "name": "Home"
	            }
	        }, {
	            "@type": "ListItem",
	            "position": 2,
	            "item": {
	                "@id": "<?php echo __APPLICATION_URL."/category"?>",
	                "name": "Product Category"
	            }
	        }]
	    }
	}