<?php

/**
 * Meteb Quote Api Class
 * 
 * This class will handle the API logic for the quote
 * 
 * @package    meteb
 * @subpackage lib
 * @author     Shadley Wentzel <shad6ster@gmail.com>
 * @version    GIT
 */
class MetebQuoteApi
{
	
	/**
	 * This function creates a Client Object from a request params array
	 * 
	 * @param array $params All the params from the request
	 * 
	 * @return client Client Object
	 */	
	public function createClient($params){
		$client = new sfGuardUser();
		$client->setFirstName($params['first_name']);
		$client->setLastName($params['last_name']);
		$client->setEmailAddress($params['email_address']);
		$client->setUsername($params['id_number']);
		$client->setIsActive(1);
		$client->save();
		
		return $client;
	}
	
	/**
	 * This function creates a UserProfile Object from request paramters
	 * 
	 * @param array $params All the params from the request
	 * @param integer $client_id Client Id of client object to associate profile with
	 * @param sfGuardUser $api_user User Object of user who created the profile
	 * 
	 * @return UserProfile UserProfile Object
	 */	
	public function createUserProfile($params, $client_id, $api_user){
		$userProfile->setSfuserId($client_id);
		$userProfile->setGenderId($params['gender']);
		$userProfile->setName($params['first_name']);
		$userProfile->setSurname($params['last_name']);
		$userProfile->setDob($params['dob']);
		$userProfile->setIdnumber($params['id_number']);
		$userProfile->setSpouseDob($params['spouse_dob']);
		$userProfile->setSpouseName($params['spouse_first_name']);
		$userProfile->setSpouseSurname($params['spouse_last_name']);
		$userProfile->setSpouseGenderId($params['spouse_gender']);
		$userProfile->setSpouseidnumber($params['spouse_id_number']);
		$userProfile->setParentUser($api_user);
		$userProfile->save();	
		
		return $userProfile;
	}
	
	
	/**
	 * This function creates a Quote Object from a request params array and client id
	 * 
	 * @param array $quote_object Quote ob
	 * @param integer $client_id Client Id of client object to associate profile with
	 * 
	 * @return quote Object of type quote
	 */	
	public function createQuote($quote_object){
		
		$params = array();
		$params["date_prepared"] = $quote_object->date_prepared;
		$params["main_name"] = $quote_object->main_name;
		$params["main_dob"] = $quote_object->main_dob;
		$params["gender_main"] = $quote_object->gender_main;
		
		# Antons function suppose to return data for new client
		$quote_calculations = MetebQuote::Web_service_quote($params);
		
		# Create Client
		
		
		# Create Userprofile
		
		
		# Create Quote
		// $quote = new Quote();
		// $quote->setClientId($client_id);
		// $quote->setQuoteTypeId($quote_calculations['quote_type']);
		// $quote->setSecondLife($quote_calculations['second_life']);
		// $quote->setMainSex($quote_calculations['main_sex']);
		// $quote->setMainDob($quote_calculations['main_dob']);
		// $quote->setSpouseSex($quote_calculations['spouse_sex']);
		// $quote->setSpouseDob($quote_calculations['spouse_dob']);
		// $quote->setGp($quote_calculations['gp']);
		// $quote->setSpouseReversionId($quote_calculations['spouse_reversion']);
		// $quote->setAnnuity($quote_calculations['annuity']);
		// $quote->setPurchasePrice($quote_calculations['purchase_price']);
		// $quote->setCommissionId($quote_calculations['commission']);
		// $quote->save();
		
		return $quote;
	}	
	
}