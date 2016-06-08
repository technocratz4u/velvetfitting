<?php
	$categoryPageDetails = $model;
?>

	{
	    "@context": "http://schema.org",
	    "@type": "Thing",
	    "name": "<?php echo $categoryPageDetails["selected_sub_category_name"] ?>",
	    "description": "<?php echo $categoryPageDetails["selected_sub_category_name"] ?> of bathroom fitting/faucet manufactured by Velvet Fitting - PRIME CREATIONS, the largest bathroom fitting manufacturer cum supplier based out of Delhi, India",
	    "url": "<?php echo __APPLICATION_URL."/category/".$categoryPageDetails["selected_sub_category_url_pattern"]."/".$categoryPageDetails["selected_sub_category_id"] ?>",
		"image": "<?php echo __APPLICATION_URL.$categoryPageDetails["selected_sub_category_images"]["image_url"][__FRONT_IMAGE_NAME]?>"
		
	}