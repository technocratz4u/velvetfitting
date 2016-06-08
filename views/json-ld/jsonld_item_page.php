<?php
	$productDetails = $model;
?>

		{
    		"@context": "http://schema.org",
		    "@type": "ItemPage",
		    "name": "Product detail page for <?php echo str_replace("\"", " INCH", $productDetails["item_name"])?>",
		    "description": "Product detail of <?php echo str_replace("\"", " INCH", $productDetails["item_name"])?> manufactured by Velvet Fitting - PRIME CREATIONS, largest bathroom fitting manufacturer cum supplier, classy and affordable faucet based out of Delhi, India",
		    "url": "<?php echo __APPLICATION_URL."/product"."/".$productDetails["item_name_url_pattern"]."/".$productDetails["item_id"]?>",
			"image": "<?php echo __APPLICATION_URL.$productDetails["images"]["image_url"][__FRONT_IMAGE_NAME]?>",
		    "breadcrumb": {
			"@type": "BreadcrumbList",
			"itemListElement": [{
			    "@type": "ListItem",
			    "position": 1,
			    "item": {
				"@id": "http://www.velvetfitting.com",
				"name": "Home"
			    }
			}, {
			    "@type": "ListItem",
			    "position": 2,
			    "item": {
				"@id": "<?php echo __APPLICATION_URL."/product"."/".$productDetails["item_name_url_pattern"]."/".$productDetails["item_id"]?>",
				"name": "<?php echo str_replace("\"", " INCH", $productDetails["item_name"])?>"
			    }
			}]
		    },
			"mainEntity": {
				"@context": "http://schema.org",
    			"@type": "Product",
			    "name": "<?php echo str_replace("\"", " INCH", $productDetails["item_name"])?>",
			    "description": "<?php echo str_replace("\"", " INCH", $productDetails["item_name"])?> is one of the finest products manufactured by Velvet Fitting - PRIME CREATIONS",
			    "url": "<?php echo __APPLICATION_URL."/product"."/".$productDetails["item_name_url_pattern"]."/".$productDetails["item_id"]?>",
				"image": "<?php echo __APPLICATION_URL.$productDetails["images"]["image_url"][__FRONT_IMAGE_NAME]?>",
				"productID":"<?php echo $productDetails["item_code"]?>",
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
		}