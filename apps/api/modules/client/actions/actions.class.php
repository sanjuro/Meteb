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

    if(!$this->getUser()->isAuthenticated())
    {
         if($this->isSoapRequest())
         {
	    	 $e = $this->isSoapRequest() ? new SoapFault('Server', 'Unauthenticated user!') : new sfSecurityException('Unauthenticated user!');
	         throw $e;

        }else{
			$this->response->setStatusCode('401');
	 		$e = new sfSecurityException('The user is not authenticated');
	        // return $this->renderPartial('messages/error', array('feedback' => $feedback));
	        throw $e;
         }
    }

    if(!$this->isSoapRequest() &&  $this->request->getParameter('token') != $this->getUser()->getApiToken()){

			$this->response->setStatusCode('401');
	 		$e = new sfSecurityException('The user is not authenticated');
	        throw $e;
    }
	
  }
  
  
  /**
  * Executes create client action for the API interface
  * based on the client id parameter using POST
  * 
  * @WSMethod(name='CreateClient',webservice='SOAPApi')
  * @WSHeader(name='AuthHeader', type='AuthData')
  * 
  * @access public
  * 
  * @param CreateClientRequest[] $arrRequests
  *
  * @return CreateClientResponse[] $result
  */    
  public function executeCreate(sfWebRequest $request)
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
			
			$this->client = $client->toArray();
	   	 	
	   		$this->response->setStatusCode('200');           
			return $this->renderPartial('messages/object', array('object' => $client->toArray()));
    }
  }

  

  /**
  * Executes get a client action for the API interface
  * based on the client id parameter
  * 
  * @WSMethod(name='ShowClients', webservice="SOAPApi")
  * @WSHeader(name='AuthHeader', type='AuthData')
  * 
  * @param string $token  Session token
  *
  * @return array All associated Clients
  */
  public function executeShow(sfWebRequest $request)
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