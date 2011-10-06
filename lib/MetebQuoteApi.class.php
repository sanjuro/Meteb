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
	 * @param array $params All the params from the request
	 * @param integer $client_id Client Id of client object to associate profile with
	 * 
	 * @return client Client Object
	 */	
	public function createQuote($params, $client_id){
		$quote = new Quote();
		$quote->setClientId($client_id);
		$quote->setQuoteTypeId($params->quote_type);
		$quote->setSecondLife($params->second_life);
		$quote->setMainSex($params->main_sex);
		$quote->setMainDob($params->main_dob);
		$quote->setSpouseSex($params->spouse_sex);
		$quote->setSpouseDob($params->spouse_dob);
		$quote->setGp($params->gp);
		$quote->setSpouseReversionId($params->spouse_reversion);
		$quote->setAnnuity($params->annuity);
		$quote->setPurchasePrice($params->purchase_price);
		$quote->setCommissionId($params->commission);
		$quote->save();
		
		return $quote;
	}	
	
}