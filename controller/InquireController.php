<?php

include __SITE_PATH . '/service/utils/SqlInjectionFilter.php' ;

class InquireController extends BaseController {
	
	public function index() {
		
		$this->registry->template->model = array();
		$this->registry->template->show('inquire');
	}
	
	public function submit(){
		$retArr = array();
	
		try{
				
			if (isset($_POST["inquiryDetail"]) &&
					isset($_POST["inquiryEmail"]) && isset($_POST["inquiryMobile"])) {
						
					$sanitizedEmail = filter_var($_POST["inquiryEmail"], FILTER_SANITIZE_EMAIL);
					
					if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
						$query = " call ".__APP_SCHEMA.".proc_inquiry(:detail, :email, :mobile) ";
						$queryArgs = array(":detail"=>SqlInjectionFilter::filter($_POST["inquiryDetail"]),
								":email"=>SqlInjectionFilter::filter($sanitizedEmail),
								":mobile"=>SqlInjectionFilter::filter($_POST["inquiryMobile"])
						);
						$stmt = Database_util::fetchStatementForProc($this->registry->db, $query, $queryArgs);
						
						$results = $stmt->fetchAll();
						if ($results) {
							foreach ($results as $r) {
								$retArr["STATUS"] = $r["proc_status"];
							}
						}
						
						if($retArr["STATUS"]=="SUCCESS"){
							//// mail to Velvet-Fitings
						
						}
					}else{
						$retArr["STATUS"] = "INVALID_EMAIL";
					}
						
			}else{
				$retArr["STATUS"] = "ERROR";
			}
	
		}catch (Exception $e) {
			$retArr["STATUS"] = "ERROR";
			trigger_error("Error occured during sending inquiry", E_USER_ERROR);
		}
		
		$this->registry->template->model = $retArr;
		$this->registry->template->show('inquiresubmit');
		
	}
	
		
}

?>
