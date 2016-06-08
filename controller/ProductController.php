<?php

include __SITE_PATH . '/service/utils/AlbumUtil.php' ;
include __SITE_PATH . '/service/utils/UrlUtil.php' ;

Class ProductController Extends BaseController {

	public function index(){
		/*** get the route from the url ***/
		$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];
		/*** get the parts of the route ***/
		$parts = explode('/', $route);
		$itemId = null;
		if(sizeof($parts)>=3 && isset($parts[2]) && !empty($parts[2])){
			$itemId = $parts[2];
			$productDetails = $this->getProductDetails($itemId);
			$this->registry->template->model = $productDetails;
			$this->registry->template->show('product');
		}else{
		 	header("HTTP/1.1 301 Moved Permanently");
		 	header("Location: ".__APPLICATION_URL."/category");
		}	
}

private function getProductDetails($itemId){
	$productDetails = array();
	$productDetails["category_items"] = array();

	$query = " call ".__APP_SCHEMA.".proc_get_item_details(:item_id) ";
	$queryArgs = array(":item_id"=>$itemId);
	$stmt = Database_util::fetchStatementForProc($this->registry->db, $query, $queryArgs);
		
	$results = $stmt->fetchAll();

	if ($results) {
		foreach ($results as $r) {
			$productDetails["item_id"] = $r["item_id"];
			$productDetails["category_name"] = $r["category_name"];
			$productDetails["category_id"] = $r["category_id"];
			$productDetails["category_name_url_pattern"] = UrlUtil::getUrlPattern($r["category_name"]);
			$productDetails["category_images"] = AlbumUtil::getImagesForCategory($r["category_id"]);
			$productDetails["item_code"] = $r["item_code"];
			$productDetails["item_name"] = $r["item_name"];
			$productDetails["item_name_url_pattern"] = UrlUtil::getUrlPattern($r["item_name"]);
			$productDetails["description"] = $r["description"];	
			$productDetails["images"] = AlbumUtil::getImagesForItem($r["item_id"]);
		}
		
	}
	$stmt->nextRowset();
	$results = $stmt->fetchAll();
	if ($results) {
		foreach ($results as $r) {
				$categoryItems = array();
				$categoryItems["item_id"] = $r["item_id"];
				$categoryItems["item_code"] = $r["item_code"];
				$categoryItems["item_name"] = $r["item_name"];
				$categoryItems["item_url_pattern"] = UrlUtil::getUrlPattern($r["item_name"]);
				$categoryItems["images"] = AlbumUtil::getImagesForItem($r["item_id"]);
				$categoryItems["category_name"] = $r["category_name"];
				$categoryItems["category_id"] = $r["category_id"];
				$categoryItems["category_images"] = AlbumUtil::getImagesForCategory($r["category_id"]);
				array_push ( $productDetails ["category_items"], $categoryItems );
		}
	}
	return 	$productDetails;
}


}

?>
