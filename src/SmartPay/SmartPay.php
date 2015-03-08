<?php

class SmartPay{
	/**
	* Function Construct
	*
	* Registers the AppKey and AppSecret from http://www.smartpay.co.ke/apps
	*
	* @param (key) The Application Key;
	* @param (secret) The Application Secret;
	* @return ()
	*/
	__construct($key,$secret){
		$this->key = $key;
		$this->secret = $secret;
	}
	/**
	* Function setAuthKey
	*
	* Registers the AuthKey(If user had allowed your app to create bills.)
	*
	* @param (auth_key) The Application Key;
	* @return ()
	*/
	function setAuthKey($auth_key){
		$this->auth_key = $auth_key;
	}
	
	/**
	* Function authenticate
	*
	* If you have no auth_key use this to validate the user
	*
	* @param (return_url) The url which the auth_key will be replied to(via POST); remember to url_encode anything
	* @param (scope) scope of what data you want(eg, basic data like name, email and profile pic, allow create bills, phone number, transaction history,  
	* @return ()
	*/
	function authenticate($return_url,array $scope = array()){
		$this->return_url = $return_url;
		$this->scope = $scope;
		
		$respose = $this->call('/authenticate', 
			array(	'return_url' => $this->return_url,
					'scope' => $this->scope );
		header('Location: '. $response['path']);
		
	}
	/**
	* Function create
	*
	* This function creates a bill, invoice or instant payment
	*
	* @param (bill) Contains the array of the bill that is to be sent to the user
	* @return (array)
	*/
	function create(array $bill){
		$respose = $this->call('/create', 
			array('bill' => $bill );
		return $response; // array{status(failed|succesful), message, id(if successful)} //please note its not the status of whether the user has paid, it is whether the user has received the bill)
	}
	
}
