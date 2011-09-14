<?php

/**
 * client actions.
 *
 * @package    eset
 * @subpackage client
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientActions extends sfActions
{
 /**
  * Executes the pre-execute session check on the API
  * call
  *
  * @param sfRequest $request A request object
  */
  public function preExecute()
  { 
	sfConfig::set('sf_web_debug', false);

  	$auth['token'] = $this->request->getParameter('token');

	// If the session does not have the generated api token. the session is
	// not authenticated or the passed api token does not match the session token
	// set 401 headers
	if(!($this->getUser()->isAuthenticated()) || !isset($auth['token']) 
		|| $auth['token'] != $this->getUser()->getApiToken())
	{
 		$this->response->setStatusCode('401');
 		$feedback = 'The user is not authenticated';
        return $this->renderPartial('messages/error', array('feedback' => $feedback));
	}
	
  }
  
  
  /**
  * Executes create client action for the API interface
  * based on the client id parameter using POST
  * 
  * @WSMethod(name='newClient', webservice="soapApi")
  * 
  * @param string $token  Session token
  *
  * @return integer The id of the new created Client
  */
  public function executeNew(sfWebRequest $request)
  {
	$api_user = $this->getUser()->getGuardUser();
	
	if ($request->isMethod('post'))
    {  
			/**
			 * Create new Client object
			 */
			$client = new sfGuardUser();
			$client->setFirstName($request['first_name']);
			$client->setLastName($request['last_name']);
			$client->setEmailAddress($request['email_address']);
			$client->setUsername($request['id_number']);
			$client->setIsActive(1);
			$client->save();
			
			/**
			 * Create new associated UserProfile object
			 */
			$userProfile = new UserProfile();
			$userProfile->setSfuserId($client->getId());
			$userProfile->setGenderId($request['gender']);
			$userProfile->setName($request['first_name']);
			$userProfile->setSurname($request['last_name']);
			$userProfile->setDob($request['dob']);
			$userProfile->setIdnumber($request['id_number']);
			$userProfile->setSpouseDob($request['spouse_dob']);
			$userProfile->setSpouseName($request['spouse_first_name']);
			$userProfile->setSpouseSurname($request['spouse_last_name']);
			$userProfile->setSpouseGenderId($request['spouse_gender']);
			$userProfile->setSpouseidnumber($request['spouse_id_number']);
			$userProfile->setParentUser($api_user);
			$userProfile->save();

			$clients = array();
			$clients[$client->getId()] = $client;
	   	 	
	   		$this->response->setStatusCode('200');           
			return $this->renderPartial('messages/object', array('object' => $client->toArray()));
    }
  }

  

  /**
  * Executes get a client action for the API interface
  * based on the client id parameter
  * 
  * @WSMethod(name='listClients', webservice="soapApi")
  * 
  * @param string $token  Session token
  *
  * @return array All associated Clients
  */
  public function executeList(sfWebRequest $request)
  {		
	$api_user = $this->getUser()->getGuardUser();
  	
  	$clients = $api_user->getClientsForUser();
	  
   	if(count($clients) > 0){
 			$this->response->setStatusCode('200');           
			return $this->renderPartial('messages/entry', array('objects' => $clients));
 	}else{
 		    $this->response->setStatusCode('401');
 		    $feedback = 'There were no clients found';
            return $this->renderPartial('messages/error', array('feedback' => $feedback));
 	}
  } 
}