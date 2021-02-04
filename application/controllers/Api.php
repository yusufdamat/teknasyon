<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
        parent::__construct();
		date_default_timezone_set('Canada/Saskatchewan');
		$this->load->model('API_Model',"API");
	}


	
	//ÜYE KAYIT
	public function userCreate(){
		
		//POST VERİLERİ
		$username = $this->input->post("username",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		$password = $this->input->post("password",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		//POST VERİLERİ
		
		$returnData = array();
		
		$usernameCheck = $this->API->_usernameControl($username,$password);
		
		if($usernameCheck === TRUE){
			
			$userInsert = $this->API->_userCreate(array("username" => $username, "password" => $password, "status" => 0, "insertDate" => date("Y-m-d H:i:s")));
			
			if($userInsert != FALSE){
				$returnData = array("status" => 1, "statusMsg" => "Kayıt Edldi - Giriş Yapılması İçin Token", "userToken" => $userInsert['client_token']);
			}else{
				$returnData = array("status" => 0, "statusMsg" => "Kayıt Hatası");
			}
			
		}else{
			
			$returnData = array("statusType" => 0, "statusMsg" => $username." Adın'da Aktif Kullanıcı Mevcut");
			$this->API->_log_activity("userLogs",array("userID" => $usernameCheck, "logText" => $username." Kullanıcı Adı Tekrarlı Kayıt Denemesi", "insertDate" => date("Y-m-d H:i:s")));
		}
		
		
		echo json_encode($returnData);
		
	}
	//ÜYE KAYIT
	
	//ÜYE GİRİŞ İŞLEMLERİ
	public function userLogin(){
		
		//POST VERİLERİ
		$username = $this->input->post("username",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		$password = $this->input->post("password",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		//POST VERİLERİ
		
		$userControl = $this->API->__SQL(array("db" => "users", "where" => "where username = '".$username."' and password = '".$password."'"));
		
		
		if($userControl != FALSE){
			
			$userID = $userControl[0]['userID'];
			
			$deviceControl = $this->API->__SQL(array("db" => "devices", "where" => "where userID = '".$userID."'"));
			
			if($deviceControl != FALSE){
				
				$userToken = $deviceControl[0]['client_token'];
				
				$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => $userToken . ' ID Devices İle Giriş Yapıldı', "insertDate" => date("Y-m-d H:i:s")));
				
				$returnData = array("statusType" => 1, "statusMsg" => "Giriş Yapıldı", "userToken" => $userToken);
				
			}else{
				
				$deviceInsert = $this->API->_userDeviceInsert($userID);
				
				if($deviceInsert != FALSE){
					$returnData = array("statusType" => 1, "statusMsg" => "Device Kayıt Edildi - Giriş Yapıldı", "token" => $deviceInsert);
				}else{
					$uID = $this->API->_RandomUID();
					$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => $uID. ' ID Devices Eklenirken Hata Oluştu', "insertDate" => date("Y-m-d H:i:s")));
					$returnData = array("statusType" => 0, "statusMsg" => "Device Eklenirken Hata Oluştur", "userToken" => "");
				}
			}
			
		}else{
			$returnData = array("statusType" => 0, "statusMsg" => "Kayıt Yok - Üye Ol" ,"userToken" => "");
		}
		
		
		echo json_encode($returnData);
		
	}
	
	
	//ÜYENİN BİLGİLERİNİ LİSTELEME
	public function userLoginControl(){
		
		//POST VERİLERİ
		$userToken = $this->input->post("userToken",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		//POST VERİLERİ
		
		$deviceControl = $this->API->__SQL(array("db" => "devices", "where" => "where client_token = '".$userToken."'"));
		
		if($deviceControl != FALSE){
			
			$userID = $deviceControl[0]['userID'];
			
			$userControl = $this->API->__SQL(array("db" => "users", "where" => "where userID = '".$userID."'"));
			
			if($userControl != FALSE){
				
				$returnData = array("statusType" => 1, "statusMsg" => "Giriş Yapıldı", "userToken" => $deviceControl[0]['client_token'], "username" => $userControl[0]['username'], "userStatus" => $userControl[0]['status']);
				
			}else{
				$this->API->_log_activity("userLogs",array("userID" => "", "logText" => 'Geçersiz Kullanıcı ID', "insertDate" => date("Y-m-d H:i:s")));
				$returnData = array("statusType" => 0, "statusMsg" => "Hatalı Kullanıcı Yetkisi", "userToken" => "");
			}
			
			
		}else{
			$this->API->_log_activity("userLogs",array("userID" => "", "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
			$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
		}
		
		
		echo json_encode($returnData);
		
		
	}
	//ÜYENİN BİLGİLERİNİ LİSTELEME
	
	//ÜYE YENİ ABONELİK KAYIT
	public function userSubscriptionCreate(){
		
		$userToken = $this->input->post("userToken",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		
		$deviceControl = $this->API->__SQL(array("db" => "devices", "where" => "where client_token = '".$userToken."'"));
		
		if($deviceControl != FALSE){
			
			$userID = $deviceControl[0]['userID'];
			
			$userControl = $this->API->__SQL(array("db" => "users", "where" => "where userID = '".$userID."'"));
			
			if($userControl != FALSE){
				$userSubscriptionCreated = $this->API->_userSubscriptionCreate($userID,array("id" => $deviceControl[0]['id'], "appID" => $deviceControl[0]['appID']));
				if($userSubscriptionCreated != FALSE){
					$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => 'Abonelik Başlatıldı', "insertDate" => date("Y-m-d H:i:s")));
					$returnData = array("statusType" => 1, "statusMsg" => "Aboneliğiniz Başlatıldı", "userToken" => $userToken );
				}else{
					$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => 'Abonelik Başlatılırken Hata Oluştu', "insertDate" => date("Y-m-d H:i:s")));
					$returnData = array("statusType" => 1, "statusMsg" => "Abonelik Başlatılırken Hata Oluştu", "userToken" => $userToken );
				}
			}else{
				$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
				$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
			}
			
		}else{
			$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
			$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
		}
		
		echo json_encode($returnData);
	}
	//ÜYE YENİ ABONELİK KAYIT

	
	//ÜYE KENDİ İPTAL EDERSE ÜYELK İPTAL
	public function userSubscriptionCancel(){
		
		$userToken = $this->input->post("userToken",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		
		$deviceControl = $this->API->__SQL(array("db" => "devices", "where" => "where client_token = '".$userToken."'"));
		
		if($deviceControl != FALSE){
			
			$userID = $deviceControl[0]['userID'];
			
			$userControl = $this->API->__SQL(array("db" => "users", "where" => "where userID = '".$userID."'"));
			
			if($userControl != FALSE){
				$userSubscriptionCancel = $this->API->_userSubscriptionCancel($userID,array("id" => $deviceControl[0]['id'], "appID" => $deviceControl[0]['appID']));
				if($userSubscriptionCancel != FALSE){
					$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => 'Abonelik İptal Edildi', "insertDate" => date("Y-m-d H:i:s")));
					$returnData = array("statusType" => 1, "statusMsg" => "Aboneliğiniz İptal Edildi", "userToken" => $userToken );
				}else{
					$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => 'Abonelik İptal Edilirken Hata Oluştu', "insertDate" => date("Y-m-d H:i:s")));
					$returnData = array("statusType" => 1, "statusMsg" => "Abonelik İptal Edilirken Hata Oluştu", "userToken" => $userToken );
				}
			}else{
				$this->API->_log_activity("userLogs",array("userID" => "", "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
				$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
			}
		}else{
			$this->API->_log_activity("userLogs",array("userID" => "", "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
			$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
		}
		
		echo json_encode($returnData);
	}
	//ÜYE KENDİ İPTAL EDERSE ÜYELK İPTAL
	
	//ÜYE ABONELİK YENİLEME
	public function userSubscriptionRenewed(){
		
		//POST VERİLERİ
		$userToken = $this->input->post("userToken",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		//POST VERİLERİ
		
		$deviceControl = $this->API->__SQL(array("db" => "devices", "where" => "where client_token = '".$userToken."'"));
		
		if($deviceControl != FALSE){
			
			$userID = $deviceControl[0]['userID'];
			
			$userControl = $this->API->__SQL(array("db" => "users", "where" => "where userID = '".$userID."'"));
			
			if($userControl != FALSE){
				
				$subscriptionControl = $this->API->__SQL(array("db" => "subscription", "where" => "where userID = '".$userID."' and status = '1' and subscriptionCancel IS NULL"));
				
				if($subscriptionControl != FALSE){
						
						$subscriptionRenewed = $this->API->_userSubscriptionRenewed($userID,$subscriptionControl[0]['subscriptionEndDate']);
						
						if($subscriptionRenewed != FALSE){
							$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => 'Aboneliğiniz Uzaltıldı', "insertDate" => date("Y-m-d H:i:s")));
							$returnData = array("statusType" => 1, "statusMsg" => "Aboneliğiniz Uzaltıldı", "userToken" => $userToken );
						}else{
							$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => 'Abonelik Uzatılırken Hata Oluştu', "insertDate" => date("Y-m-d H:i:s")));
							$returnData = array("statusType" => 0, "statusMsg" => "Abonelik Uzatılırken Hata Oluştu", "userToken" => $userToken );
						}						
				}else{
					$this->API->_log_activity("userLogs",array("userID" => $userID, "logText" => 'Aktif Aboneliğiniz Bulunmamaktadır', "insertDate" => date("Y-m-d H:i:s")));
					$returnData = array("statusType" => 0, "statusMsg" => "Aktif Aboneliğiniz Bulunmamaktadır", "userToken" => $userToken );
				}
				
			}else{
				$this->API->_log_activity("userLogs",array("userID" => "", "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
				$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
			}
		}else{
			$this->API->_log_activity("userLogs",array("userID" => "", "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
			$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
		}
		
		echo json_encode($returnData);
		
	}
	//ÜYE ABONELİK YENİLEME
	
	
	//ÜYE SATIN ALMA GEÇMİŞİ
	public function userSubscriptionHistory(){
		
		//POST VERİLERİ
		$userToken = $this->input->post("userToken",true); // XSS Filtresi yaparak gelen veriyi kontrol ediyoruz
		//POST VERİLERİ
		
		$deviceControl = $this->API->__SQL(array("db" => "devices", "where" => "where client_token = '".$userToken."'"));
		
		if($deviceControl != FALSE){
			
			$userID = $deviceControl[0]['userID'];
			
			$userControl = $this->API->__SQL(array("db" => "users", "where" => "where userID = '".$userID."'"));
			
			if($userControl != FALSE){
				$returnData = array("statusType" => 1, "statusMsg" => "Abonelik Geçmisiniz", "userToken" => $userToken );
				$returnData['history'] = $this->API->_userSubscriptionHistory($userID);
			}else{
				$this->API->_log_activity("userLogs",array("userID" => "", "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
				$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
			}
		}else{
			$this->API->_log_activity("userLogs",array("userID" => "", "logText" => $userToken. ' Geçersiz Token', "insertDate" => date("Y-m-d H:i:s")));
			$returnData = array("statusType" => 0, "statusMsg" => "Geçersiz Token", "userToken" => "");
		}
		
		echo json_encode($returnData);
		
	}
	//ÜYE SATIN ALMA GEÇMİŞİ
	
	
	
	
	
	
	
	
	
	
	
	
	
}
