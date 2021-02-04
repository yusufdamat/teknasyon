<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Api_Model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
	}
	
	public $language = array("TR","EN","PT","DE","AR","ZH");
	public $osSystem = array("Android","iOS","Blackberry","Windows Phone","Ubuntu");
		
	/* 	
		Random Cihaz Id'leri Üretiyoruz.
	*/
	private function _RandomUID(){
	
	if (function_exists('com_create_guid') === true){
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04x%04s-%04s-%04s-%04s-%04s%04s%04s', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	
	
	public function __SQL($data){
		
		$db = $this->db->query("select * from ".$data['db']." ".$data['where']);
		
		if($db->num_rows() > 0){
			return $db->result_array();
		}else{
			return FALSE;
		}
	}
	
	public function _log_activity($table,$data){
		
		$logInsert = $this->db->insert($table,$data);
		
	}
	
	
	public function _usernameControl($username,$password){		
		
		$checkUser = $this->db->query("select userID,username from users where username = '".$username."'");
		
		if($checkUser->num_rows() > 0){
			return $checkUser->result_array()[0]['userID'];
		}else{
			return TRUE;
		}
	}
	
	public function _userCreate($userData){
		
		
		$userInsert = $this->db->insert("users",$userData);
		
		if($userInsert){
			$userID = $this->db->insert_id();
			$this->_log_activity("userLogs",array("userID" => $userID, "logText" => "Yeni Bir Kullanıcı Eklendi", "insertDate" => date("Y-m-d H:i:s")));
			$userToken = $this->_userDeviceInsert($userID);
			return $userToken;
		}else{
			return FALSE;
		}

	}
	
	public function _userDeviceInsert($userID){
		
		$uID	  = $this->_RandomUID();
		$appID	  = $this->_RandomUID();
			
		$dataDevice = array(
			"userID"			=> $userID,
			"uid" 				=> $uID,
			"appID"				=> $appID,
			"language"			=> $this->language[rand(0,(count($this->language)-1))],
			"operating-system"	=> $this->osSystem[rand(0,(count($this->osSystem)-1))],
			"client_token"		=> substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,64),
			"insertDate"		=> date("Y-m-d H:i:s")
		  );
		  
		 $deviceInsert =  $this->db->insert("devices",$dataDevice);
		 
		 if($deviceInsert){
			 $this->_log_activity("userLogs",array("userID" => $userID, "logText" => $appID." Id'li Yeni Cihaz Eklendi", "insertDate" => date("Y-m-d H:i:s")));
			 return $dataDevice['client_token'];
		 }else{
			 $this->_log_activity("userLogs",array("userID" => $userID, "logText" => $appID." Id'li Yeni Cihaz Eklenirken Hata Oluştur", "insertDate" => date("Y-m-d H:i:s")));
			 return FALSE;
		 }
		
	}
	
	public function _userSubscriptionCreate($userID,$deviceData){
		
		
		$dataSubscription= array(
			"userID" 					=> $userID,
			"receiptCode"				=> $this->_RandomUID(),
			"subscriptionStartDate"		=> date("Y-m-d H:i:s"),
			"subscriptionEndDate"		=> date("Y-m-d H:i:s",strtotime("+30 days")),
			"status"					=> 1,
			"appID"						=> $deviceData['appID'],
			"deviceID"					=> $deviceData['id'],
		  );
		  
		 $deviceSubscriptionInsert =  $this->db->insert("subscription",$dataSubscription);
		 
		 if($deviceSubscriptionInsert){
			 
			 //ABONELİK ALDI
			 $this->db->where("userID",$userID);
			 $this->db->update("users",array("status" => 1));
			 //ABONELİK ALDI
			 
			 
			 return TRUE;
		 }else{
			 return FALSE;
		 }
	}
	
	
	public function _userSubscriptionCancel($userID,$deviceData){
		
		
		$dataSubscription= array(
			"userID" 					=> $userID,
			"subscriptionCancel"		=> 1,
			"status"					=> 1,
			"appID"						=> $deviceData['appID'],
			"deviceID"					=> $deviceData['id'],
		  );
		  
		 $deviceSubscriptionInsert =  $this->db->insert("subscription",$dataSubscription);
		 
									  $this->db->where("userID",$userID);
									  $this->db->where("status",1);
		  $deviceSubscriptionUpdate = $this->db->update("subscription",$dataSubscription);
		 
		 if($deviceSubscriptionUpdate){
			 return TRUE;
		 }else{
			 return FALSE;
		 }
		
	}

	

	
	public function _userSubscriptionRenewed($userID,$subscriptionDate){
		
	
		
		$this->db->where("userID",$userID);
		$this->db->where("status",1);
		$userSubscriptionRenewedUpdate = $this->db->update("subscription",array("subscriptionEndDate" => date("Y-m-d H:i:s",strtotime("+30 days",strtotime($subscriptionDate)))));
		
		if($userSubscriptionRenewedUpdate){
			return TRUE;
		}else{
			return FALSE;
		}
		
		
	}
	
	
	public function _userSubscriptionHistory($userID){
		
		
		$userHistory = $this->db->query("select * from subscription where userid = '".$userID."' ORDER BY id DESC");
		$historyData = array();
		
		if($userHistory->num_rows() > 0){		
		
			foreach ($userHistory->result_array() as $row){
				$status = ($row['subscriptionCancel'] == 1)?'Pasif Abonelik':'Aktif Abonelik';
				$historyData[] = array("subscriptionStartDate" => $row['subscriptionStartDate'], "subscriptionEndDate" => $row['subscriptionEndDate'], "subscriptionCancel" => $row['subscriptionCancel'], "status" => $status);
			}	
			return $historyData;
		}else{
			return $historyData;
		}
	}
	
	
	
}


 