<?php

include __SITE_PATH . '/service/utils/SqlInjectionFilter.php' ;
include __SITE_PATH . '/service/utils/EmailUtil.php' ;

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
							$mailArgs = array();
							$mailArgs["mailTo"] = filter_var(__MY_MAIL_ID, FILTER_SANITIZE_EMAIL);;
							$mailArgs["detail"] = SqlInjectionFilter::filter($_POST["inquiryDetail"]);
							$mailArgs["email"] = SqlInjectionFilter::filter($sanitizedEmail);
							$mailArgs["mobile"] = SqlInjectionFilter::filter($_POST["inquiryMobile"]);
							$mailStatus = $this->mailInquiryToAdmin($mailArgs);
							
							//if($mailStatus){
								$userMailArgs = array();
								$userMailArgs["mailTo"] = $sanitizedEmail;
								$mailStatus = $this->mailInquiryConfirmationToUser($userMailArgs);
							//}
							
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
	
	private function mailInquiryConfirmationToUser($sendmailArgs){
		$mailingStatus = false;
		try{
	
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							    <head>
							        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							        <title>'.__APPLICATION_NAME.' inquiry acknowledgement</title>
							        <style>
										.emailContainerTbl{
											background-color:#D9E5ED;
										}
	
										.emailHeaderTbl{
											background-color:#1C0B5A;
											color:#FFFFFF;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailBodyTbl{
											color: #333333;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailFooterTbl{
											background-color:#1C0B5A;
											color:#FFFFFF;
											font:10px Arial,Helvetica sans-serif;
										}
	
										.credentialsTbl{
											font:15px Arial,Helvetica sans-serif;
											padding-top:10px;
										}
	
										.credentialsTblCol{
											style="padding:0px 5px;"
										}
	
										.loginbutton{
											background-color: #1C0B5A;
											border: 1px solid #1C0B5A;
											color: #FFFFFF;
											cursor: pointer;
											display: inline-block;
											font: bold 14px tahoma,verdana,arial,sans-serif;
											margin: 20px 0px 0px 0px;
											padding: 0.3em 0.6em 0.375em; position: relative;
											text-align: center; text-decoration: none;
											white-space: nowrap;
											z-index: 1;
										}
	
										.footerLink{
											color:#FFFFFF;
										}
	
									</style>
							    </head>
							    <body>
									<table cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
									    <tr>
									        <td align="center" valign="top">
									            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer"
													class="emailContainerTbl" style="background-color:#F5F5F5;">
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailHeader"
																class="emailHeaderTbl" style="background-color:#1C0B5A;color:#FFFFFF;font:15px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="center" valign="top">
									                                    Thanks for contacting '.__APPLICATION_NAME.'
									                                </td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody"
									                            class="emailBodyTbl" style="font:15px Arial,Helvetica sans-serif;color: #333333;">
									                            <tr>
									                                <td align="center" valign="top">
									                                    Dear user, <br/><br/>
																		Thanks for showing interest in the products of '.__APPLICATION_NAME.'.<br/>
																		Your inquiry is under process.<br/>
																		'.__APPLICATION_NAME.' will get back to you soon.
									                                </td>
									                            </tr>
																
																<tr>
									                                <td align="center" valign="top">
																		<a target="_blank" href="'.__APPLICATION_URL.'" class="loginbutton"
																			style="background-color: #1C0B5A; border: 1px solid #1C0B5A;
																				color: #FFFFFF; cursor: pointer; display: inline-block; font: bold 14px tahoma,verdana,arial,sans-serif; margin: 20px 0px 0px 0px;
																				padding: 0.3em 0.6em 0.375em; position: relative; text-align: center; text-decoration: none; white-space: nowrap;
																				z-index: 1;">'.__APPLICATION_NAME.'</a>
																	</td>
																</tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailFooter"
																class="emailFooterTbl" style="background-color:#1C0B5A;color:#FFFFFF;font:10px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="left" valign="top">
									                                    This is an auto-mailer. Please do not reply to this mail.<br/>
																		Website : <a class="footerLink" style="color:#FFFFFF;" target="_blank" href="'.__APPLICATION_URL.'">'.__APPLICATION_URL.'</a> |
																			Mail : <a class="footerLink" style="color:#FFFFFF;" href="mailto:'.__MY_MAIL_ID.'">'.__MY_MAIL_ID.'</a>
	
									                                </td>
																	<td align="right" valign="bottom">
																		&copy; 2016 PRIME CREATIONS All Rights Reserved
																	</td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									            </table>
									        </td>
									    </tr>
									</table>
								</body>
							</html>';
	
			$mailData=array();
			$mailData["message"] = $message;
			$mailData["emailto"] = $sendmailArgs["mailTo"];
			$mailData["emailsubject"] = "Thanks for contacting ".__APPLICATION_NAME;
	
			$mailingStatus = EmailUtil::sendMail($mailData);
	
		}catch (Exception $e) {
			$mailingStatus = false;
		}
	
		return $mailingStatus;
	}
	
	private function mailInquiryToAdmin($sendmailArgs){
		$mailingStatus = false;
		try{
	
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							    <head>
							        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							        <title>'.__APPLICATION_NAME.' website - user inquiry</title>
							        <style>
										.emailContainerTbl{
											background-color:#D9E5ED;
										}
	
										.emailHeaderTbl{
											background-color:#1C0B5A;
											color:#FFFFFF;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailBodyTbl{
											color: #333333;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailFooterTbl{
											background-color:#1C0B5A;
											color:#FFFFFF;
											font:10px Arial,Helvetica sans-serif;
										}
	
										.credentialsTbl{
											font:15px Arial,Helvetica sans-serif;
											padding-top:10px;
										}
	
										.credentialsTblCol{
											style="padding:0px 5px;"
										}
	
										.loginbutton{
											background-color: #1C0B5A;
											border: 1px solid #1C0B5A;
											color: #FFFFFF;
											cursor: pointer;
											display: inline-block;
											font: bold 14px tahoma,verdana,arial,sans-serif;
											margin: 20px 0px 0px 0px;
											padding: 0.3em 0.6em 0.375em; position: relative;
											text-align: center; text-decoration: none;
											white-space: nowrap;
											z-index: 1;
										}
	
										.footerLink{
											color:#FFFFFF;
										}
	
									</style>
							    </head>
							    <body>
									<table cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
									    <tr>
									        <td align="center" valign="top">
									            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer"
													class="emailContainerTbl" style="background-color:#F5F5F5;">
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailHeader"
																class="emailHeaderTbl" style="background-color:#1C0B5A;color:#FFFFFF;font:15px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="center" valign="top">
									                                    '.__APPLICATION_NAME.' website - Inquiry from user
									                                </td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody"
									                            class="emailBodyTbl" style="font:15px Arial,Helvetica sans-serif;color: #333333;">
									                            <tr>
									                                <td align="left" valign="top">
									                                    Hi '.__APPLICATION_NAME.' Admin, <br/><br/>
																		A '.__APPLICATION_NAME.' website user has shown interest your products.<br/>
																		Please find below the details.<br/><br/>
																		<b>Inquiry Details :</b><br/>
																		'.$sendmailArgs["detail"].' <br/><br/>
																		<b>Contact Details :</b><br/>
																		Email : <a href="mailto:'.$sendmailArgs["email"].'">'.$sendmailArgs["email"].'</a><br/>
																		Mobile No. : <a href="tel:'.$sendmailArgs["mobile"].'">'.$sendmailArgs["mobile"].'</a><br/>
									                                </td>
									                            </tr>
	
																<tr>
									                                <td align="left" valign="top">
																		<a target="_blank" href="'.__APPLICATION_URL.'" class="loginbutton"
																			style="background-color: #1C0B5A; border: 1px solid #1C0B5A;
																				color: #FFFFFF; cursor: pointer; display: inline-block; font: bold 14px tahoma,verdana,arial,sans-serif; margin: 20px 0px 0px 0px;
																				padding: 0.3em 0.6em 0.375em; position: relative; text-align: center; text-decoration: none; white-space: nowrap;
																				z-index: 1;">'.__APPLICATION_NAME.'</a>
																	</td>
																</tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailFooter"
																class="emailFooterTbl" style="background-color:#1C0B5A;color:#FFFFFF;font:10px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="left" valign="top">
									                                    This is an auto-mailer. Please do not reply to this mail.<br/>
																		Website : <a class="footerLink" style="color:#FFFFFF;" target="_blank" href="'.__APPLICATION_URL.'">'.__APPLICATION_URL.'</a> |
																			Mail : <a class="footerLink" style="color:#FFFFFF;" href="mailto:'.__MY_MAIL_ID.'">'.__MY_MAIL_ID.'</a>
	
									                                </td>
																	<td align="right" valign="bottom">
																		&copy; 2016 PRIME CREATIONS All Rights Reserved
																	</td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									            </table>
									        </td>
									    </tr>
									</table>
								</body>
							</html>';
	
			$mailData=array();
			$mailData["message"] = $message;
			$mailData["emailto"] = $sendmailArgs["mailTo"];
			$mailData["emailsubject"] = __APPLICATION_NAME." website - Inquiry from user";
	
			$mailingStatus = EmailUtil::sendMail($mailData);
	
		}catch (Exception $e) {
			$mailingStatus = false;
		}
	
		return $mailingStatus;
	}
	
		
}

?>
