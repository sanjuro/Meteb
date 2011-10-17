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

  }
  
  
  /**
  * Executes create client action for the API interface
  * based on the client id parameter using POST
  * 
  * @WSMethod(name='newClient', webservice="SOAPApi")
  * 
  * @param string $token Api token
  * @param newClientRequest $newClient  Client Information to be used for the new license
  *
  * @return string $result
  */
  public function executeNew(sfWebRequest $request)
  {
  	
    $token = $request->getParameter('token');

    $api_token = $this->getUser()->getAttribute('api_token', '', 'user');

    if (empty($token) && $token != $api_token) {
		if($this->isSoapRequest()){
			$e = new SoapFault('Server', 'The user is not authenticated!');
			throw $e;
		}else{
		    $this->response->setStatusCode('401');
			$feedback = 'The user is not authenticated';
			$this->feedback  = $feedback;
			return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
		}
    }

	$c = $request->getParameter('newClient');
	
       if(empty($client)){

            /**
            * Adding all client associated entities
            */
         try {
				/**
				 * Create new Client object
				 */
				$client = new sfGuardUser();
				$client->setFirstName($c->first_name);
				$client->setLastName($c->last_name);
				$client->setEmailAddress($c->email_address);
				$client->setUsername($c->id_number);
				$client->setIsActive(1);
				$client->save();
				
				/**
				 * Create new associated UserProfile object
				 */
				$userProfile = new UserProfile();
				$userProfile->setSfuserId($client->getId());
				$userProfile->setGenderId($c->gender);
				$userProfile->setName($c->first_name);
				$userProfile->setSurname($c->last_name);
				$userProfile->setDob($c->dob);
				$userProfile->setIdnumber($c->id_number);
				$userProfile->setSpouseDob($c->spouse_dob);
				$userProfile->setSpouseName($c->spouse_first_name);
				$userProfile->setSpouseSurname($c->spouse_last_name);
				$userProfile->setSpouseGenderId($c->spouse_gender);
				$userProfile->setSpouseidnumber($c->spouse_id_number);
				$userProfile->setParentUser($this->getUser());
				$userProfile->save();
	
				$clients = array();
				$clients[$client->getId()] = $client;
				
				$this->client = $client->toArray();
	   	 	

                $this->$result = $client->getId();

                $this->response->setStatusCode('200');

                return $this->renderPartial('messages/message', array('message' => $this->$result));


         } catch (Exception $e) {


             if($this->isSoapRequest()){
                 $e = new SoapFault('Server',  $e->getMessage());
                 throw $e;
             }else{
                 $this->response->setStatusCode('401');
                 $feedback = $e->getMessage();
                 $this->feedback  = $feedback;
                 return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
             }

         }

     }else{
         $this->$result = $client->getId();

	     return $this->renderPartial('messages/message', array('message' => $this->$result));

     }	
  }

  

  /**
  * Executes get a client action for the API interface
  * based on the client id parameter
  * 
  * @WSMethod(name='listClients', webservice="SOAPApi")
  * 
  * @param string $token  Session token
  *
  * @return array All associated Clients
  */
  public function executeShow(sfWebRequest $request)
  {		
    $token = $request->getParameter('token');

    $api_token = $this->getUser()->getAttribute('api_token', '', 'user');

    if (empty($token) && $token != $api_token) {
		if($this->isSoapRequest()){
			$e = new SoapFault('Server', 'The user is not authenticated!');
			throw $e;
		}else{
		    $this->response->setStatusCode('401');
			$feedback = 'The user is not authenticated';
			$this->feedback  = $feedback;
			return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
		}
    }
  	
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