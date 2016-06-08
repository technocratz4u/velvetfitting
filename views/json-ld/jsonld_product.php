<?php
	$productDetails = $model;
?>

	{
    	"@context": "http://schema.org",
    	"@type": "Product",
    	"name": "<?php echo str_replace("\"", " INCH", $productDetails["item_name"])?>",
    	"description": "<?php echo str_replace("\"", " INCH", $productDetails["item_name"])?> is one of the finest products manufactured by Velvet Fitting - PRIME CREATIONS",
    	"url": "<?php echo __APPLICATION_URL."/product"."/".$productDetails["item_name_url_pattern"]."/".$productDetails["item_id"]?>",
		"image": "<?php echo __APPLICATION_URL.$productDetails["images"]["image_url"][__FRONT_IMAGE_NAME]?>",
		"productID":"<?php echo $productDetails["item_code"]?>",
		"category": {
			"@type": "Thing",
			"name": "<?php echo $productDetails["category_name"]?>",
			"url": "<?php echo __APPLICATION_URL."/category"."/".$productDetails["category_name_url_pattern"]."/".$productDetails["category_id"]?>",
			"image": "<?php echo __APPLICATION_URL.$productDetails["category_images"]["image_url"][__FRONT_IMAGE_NAME]?>"
		},
		"brand": {
            "@type": "Brand",
            "name": "Velvet Fitting",
            "description": "The best quality and most affordable bathroom fitting and faucet brand",
            "url": "http://www.velvetfitting.com",
            "logo": "http://www.velvetfitting.com/logo.jpg",
			"image": "http://www.example.com/images/logo.png",
            "sameAs": ["http://www.facebook.com/example",
                "http://www.twitter.com/example",
                "http://plus.google.com/example"
            ]
        },
		"isRelatedTo" : [
		
					<?php
                		if(isset($productDetails["category_items"]) && sizeof($productDetails["category_items"])>0){
                			foreach ($productDetails["category_items"] as $itemsCategoryIndex => $itemsCategoryElem) {
                	?>
						<?php
							if($itemsCategoryIndex>0){
						?>
								,
						<?php
							}
						?>
						{
    						"@context": "http://schema.org",
					    	"@type": "Product",
					    	"name": "<?php echo str_replace("\"", " INCH", $itemsCategoryElem["item_name"])?>",
					    	"description": "<?php echo str_replace("\"", " INCH", $itemsCategoryElem["item_name"])?> is one of the finest products manufactured by Velvet Fitting - PRIME CREATIONS",
					    	"url": "<?php echo __APPLICATION_URL."/product"."/".$itemsCategoryElem["item_url_pattern"]."/".$itemsCategoryElem["item_id"]?>",
							"image": "<?php echo __APPLICATION_URL.$itemsCategoryElem["images"]["image_url"][__FRONT_IMAGE_NAME]?>",
							"productID":"<?php echo $itemsCategoryElem["item_code"]?>",
							"category": {
								"@type": "Thing",
								"name": "<?php echo $itemsCategoryElem["category_name"]?>",
								"url": "<?php echo __APPLICATION_URL."/category"."/".$itemsCategoryElem["category_name_url_pattern"]."/".$itemsCategoryElem["category_id"]?>",
								"image": "<?php echo __APPLICATION_URL.$itemsCategoryElem["category_images"]["image_url"][__FRONT_IMAGE_NAME]?>"
							},
							"brand": {
							    "@type": "Brand",
							    "name": "Velvet Fitting",
							    "description": "The best quality and most affordable bathroom fitting and faucet brand",
							    "url": "http://www.velvetfitting.com",
							    "logo": "http://www.velvetfitting.com/logo.jpg",
								"image": "http://www.example.com/images/logo.png",
							    "sameAs": ["http://www.facebook.com/example",
								"http://www.twitter.com/example",
								"http://plus.google.com/example"
							    ]
							}
						}
	                <?php		
                			}
                		}
					?>

		]
	}