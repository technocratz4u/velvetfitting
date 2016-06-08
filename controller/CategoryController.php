<?php

include __SITE_PATH . '/service/utils/AlbumUtil.php' ;
include __SITE_PATH . '/service/utils/UrlUtil.php' ;
include __SITE_PATH . '/service/utils/SqlInjectionFilter.php' ;

Class CategoryController Extends BaseController {

	public function index() {
		
		$subCategoryId = null;
		/*** get the route from the url ***/
		$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];
		/*** get the parts of the route ***/
		$parts = explode('/', $route);
		if(sizeof($parts)>=3 && isset($parts[2]) && !empty($parts[2])){
			$subCategoryId = SqlInjectionFilter::filter($parts[2]);
		}
		
		$categoryPageDetails = $this->getCategoryPageDetails($subCategoryId);
		$this->registry->template->model = $categoryPageDetails;
		$this->registry->template->show('category');
	}
	
	private function getCategoryPageDetails($subCategoryId){
		$categoryPageDetails = array();
		$categoryPageDetails["category_details"] = array();
		if(isset($subCategoryId)){
			$categoryPageDetails["selected_sub_category_id"] = $subCategoryId;
		}
	
		$query = " call ".__APP_SCHEMA.".proc_category(:sub_category_id) ";
		$queryArgs = array(
				"sub_category_id" => $subCategoryId
		);
		$stmt = Database_util::fetchStatementForProc($this->registry->db, $query, $queryArgs);
			
		$results = $stmt->fetchAll();
		if ($results) {
			foreach ($results as $r) {
				
				if(!isset($categoryPageDetails["category_details"][$r["category_id"]])){
					$categoryPageDetails["category_details"][$r["category_id"]] = array();
					$categoryPageDetails["category_details"][$r["category_id"]]["category_id"] = $r["category_id"];
					$categoryPageDetails["category_details"][$r["category_id"]]["category_name"] = $r["category_name"];
					$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"] = array();
				}
				
				if(!isset($categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$r["sub_category_id"]])){
					// if this is the selected subcategory, fetch the sub_category_url_pattern to be used as part of rel=canonical
					if($r["sub_category_id"]==$subCategoryId){
						$categoryPageDetails["selected_sub_category_name"] = $r["sub_category_name"];
						$categoryPageDetails["selected_sub_category_url_pattern"] = UrlUtil::getUrlPattern($r["sub_category_name"]);
						$categoryPageDetails["selected_sub_category_images"] = AlbumUtil::getImagesForCategory($r["sub_category_id"]);
					}
					$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$r["sub_category_id"]] = array();
					$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$r["sub_category_id"]]["sub_category_id"] = $r["sub_category_id"];
					$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$r["sub_category_id"]]["sub_category_name"] = $r["sub_category_name"];
					$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$r["sub_category_id"]]["sub_category_url_pattern"] = UrlUtil::getUrlPattern($r["sub_category_name"]);
					$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$r["sub_category_id"]]["images"] = AlbumUtil::getImagesForCategory($r["sub_category_id"]);
					
				}
			}
		}
		
		if(isset($subCategoryId)){
			$stmt->nextRowset();
			$results = $stmt->fetchAll();
			if ($results) {
				$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$subCategoryId]["item_details"] = array();
				foreach ($results as $r) {
					
					$itemDetail = array();
		
					$itemDetail["item_id"] = $r["item_id"];
					$itemDetail["item_code"] = $r["item_code"];
					$itemDetail["item_name"] = $r["item_name"];
					$itemDetail["item_url_pattern"] = UrlUtil::getUrlPattern($r["item_name"]);
					$itemDetail["images"] = AlbumUtil::getImagesForItem($r["item_id"]);
		
					$categoryPageDetails["category_details"][$r["category_id"]]["sub_category_details"][$subCategoryId]["item_details"][] = $itemDetail;
				}
			}
		}
	
		return 	$categoryPageDetails;
	}
		
}

?>
